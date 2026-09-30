<!DOCTYPE html>
<html>
    <head>
        <title>Create Account</title>
        <link rel='stylesheet' href='style.css'>
</head>
<style>

#no {background: none; box-shadow: none;}
.blob {position: relative; top:200px; z-index: -5; animation: angle 15s var(--angle-delay) infinite linear} 
.homepage h4{text-align: center;}
form input[type='number'] {width: 15%; margin: 6px 0;}
#format {padding: 5px; font-size: var(--font-size-min); border: none; border-radius: 2px; outline: none; background: #1b3a57; color: #e0e1dd;}
label {color: #e0e1dd; font-size: var(--font-size-min); }
</style>
<body>
<main>
    
    <div class="homepage"><h4>Library PC<br>Add an Account</h4></div>
    
<div class="admin-container">
<div class="create-container">
    <form method='POST'>
        <p>Student ID</p><input type='text' name='sid' required maxlength='10'>
        <p>Time Package</p>
        <label>Start Time: </label><input type='number' name='starthour' min='1' max='12' required> <label>:</label><input type='number' name='startmin' min='0' max='59' required>
        <select name='formatstart' id='format'><option value='am' name='am'>AM</option><option value='pm' name='pm'>PM</option></select><br>

        <label>End Time: </label><input type='number' name='endhour' min='1' max='12' required> <label>:</label> <input type='number' name='endmin' min='0' max='59' required>
        <select name='formatend' id='format'><option value='am' name='am'>AM</option><option value='pm' name='pm'>PM</option></select><br>
        <p id='feedback'></p>
        <button type='reset'><a id='no' href='index.php'>Home</a></button><button type='submit'>Submit</button>
    </form>

</div>
</div> <!--Admin container -->
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

<?php 
require_once "db.php";
if(isset($_POST['sid']) && $_SERVER['REQUEST_METHOD']=='POST') {
$id = $_POST['sid'];
$sh = $_POST['starthour'];
$sm = $_POST['startmin'];
$eh = $_POST['endhour'];
$em = $_POST['endmin'];
$fs = $_POST['formatstart'];
$fe = $_POST['formatend'];


$start_time = $sh . ":" . $sm . $fs;
$end_time = $eh . ":" . $em . $fe;

$result=$conn->query("SELECT student_id FROM session WHERE student_id = $id");
if($result->num_rows > 0) {
    echo "
    <script>document.getElementById('feedback').innerText = 'Student ID already use!'</script>
    ";
} else {
    $row = $result->fetch_assoc();
    $sql = "INSERT INTO session(student_id, start_time, end_time) VALUES ('$id','$start_time', '$end_time')";

    if($conn->query($sql)) {
        echo "
        <script>document.getElementById('feedback').innerText = 'Data added successfully!'</script>
        ";
    }
}

}
?>