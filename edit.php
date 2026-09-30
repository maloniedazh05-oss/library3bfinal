<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <link rel='stylesheet' href='style.css'>
<style>
    .container input[type='number'] {width: 15%; margin: 6px 0;}
#format {padding: 5px; font-size: var(--font-size-min); border: none; border-radius: 2px; outline: none; background: #1b3a57; color: #e0e1dd;}
label {color: #e0e1dd; font-size: var(--font-size-min); }
.container {display: block;}
form p {margin:5px 0;}
</style>
</head>
<body>
    <main>
        <div class="homepage"><h4>Library PC<br>Edit an Account</h4></div>
        <div class="admin-container">

        <p id='feedbackEdit'></p>
        
        <?php 
        require_once "db.php";
        if(isset($_GET['id_edit']) && $_SERVER['REQUEST_METHOD']=='GET') {
            $id_edit = $_GET['id_edit'];
            $result = $conn->query("SELECT student_id FROM session WHERE id = $id_edit");
            $row=$result->fetch_assoc();
            echo "
            <form method='GET'>
            <p>Student ID</p><input type='text' name='select' required maxlength='10' value='".$row['student_id']."'>
            <button type='submit'>Select</button>
        </form>
            ";
        }

        if(isset($_GET['select']) && $_SERVER['REQUEST_METHOD']=='GET') {
            $id = $_GET['select'];
            $result = $conn->query("SELECT student_id FROM session WHERE student_id = $id");
            if($result->num_rows > 0) {
                $result = $conn->query("SELECT id, start_time, end_time FROM session WHERE student_id = $id");
                $row=$result->fetch_assoc();

                echo "
                <p>Editing Student ID: {$id}</p>
                <form method='POST'>
                <p>Start Time: ".$row['start_time']."</p><p>End Time: ".$row['end_time']."</p>
                <div class='container'>
                <input type='hidden' value='".$row['id']."' name='realid'>
                <label>Current Student ID: </label><input type='text' maxlength='10' value='$id' name='edit' required><br>
        <label>Start Time: </label><input type='number' name='starthour' value='' min='1' max='12' required> <label>:</label><input type='number' name='startmin' min='0' max='59' required>
        <select name='formatstart' id='format'><option value='am' name='am'>AM</option><option value='pm' name='pm'>PM</option></select><br>

        <label>End Time: </label><input type='number' name='endhour' min='1' max='12' required> <label>:</label> <input type='number' name='endmin' min='0' max='59' required>
        <select name='formatend' id='format'><option value='am' name='am'>AM</option><option value='pm' name='pm'>PM</option></select><br>
        <button type='submit'>Submit</button>
        </div>
        </form>
                ";
            } else {
                echo "<script>document.getElementById('feedbackEdit').innerText = 'Student ID NOT FOUND!'</script>";
            }
        }

    if(isset($_POST['edit']) && $_SERVER['REQUEST_METHOD']=='POST') {
        $sid = $_POST['edit'];
        $sh = $_POST['starthour'];
        $sm = $_POST['startmin'];
        $eh = $_POST['endhour'];
        $em = $_POST['endmin'];
        $fs = $_POST['formatstart'];
        $fe = $_POST['formatend'];
        $id = $_POST['realid'];
        $start_time = $sh . ":" . $sm . $fs;
        $end_time = $eh . ":" . $em . $fe;

        $sql = "UPDATE session SET student_id = '$sid',
        start_time = '$start_time',
        end_time = '$end_time' WHERE id = $id";

        if($conn->query($sql)) {
                echo "<script>document.getElementById('feedbackEdit').innerText = 'Student ID updated Success!'</script>";
        }
    }
        ?>

        <button><a href='index.php' style='background: none; box-shadow: none;'>Home</a></button>
        </div>
                    <div class="blobs">
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
            </div>
            
    </main>
</body>
</html>