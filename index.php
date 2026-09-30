<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Shop</title>
    <link rel='stylesheet' href='style.css'>
    <style>
a:hover{translate: 0 -1px; animation:ease-in-out infinite 3s link; color: white;}
a{position: relative; margin: 5px 0; text-decoration: none; background: linear-gradient(var(--degree-l),var(--admin-color-a1), var(--admin-color-a2)); color: var(--small-color); padding: .4em; box-shadow: 2px 2px 5px black;} 

table {border-collapse: collapse; color: #e0e1dd; width: 80%; margin: 1em;}
</style>

</head>

    <header>
        <body>                                
            <div class="blobs">
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            </div>
            <div class="overlay"></div>

    <h3>Library Computer</h3>
</label>
    </header>

    <main>
    <div class="homepage"><h4 style='font-size: 1em;'>Home Page</h4></div>
        <div class="admin-container">
            <h4>Accoiunts</h4>
            <table border='1' cellpadding='5'>
                
<?php 
            require_once "db.php";
            $result = $conn->query("SELECT * FROM session");
            if($result->num_rows > 0) {
                echo "
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>

                ";

                while($row=$result->fetch_assoc()) {
                echo "
                <tr>
                    <td>".$row['id']."</td>
                    <td>".$row['student_id']."</td>
                    <td>".$row['start_time']."</td>
                    <td>".$row['end_time']."</td>
                    <td>
                    <form action='edit.php' method='GET'>
                    <a href='edit.php' style='background: none; box-shadow: none; cursor: pointer;'><button type='submit' style='margin: 0;'>Edit</button></a>
                    <input type='hidden' value='".$row['id']."' name='id_edit'>
                    </form>
                    </td>
                    <td>
                    <a href='#' style='background: none; box-shadow: none; cursor: pointer;'><button type='submit' style='margin: 0;' onclick='confirmDelete(\"" . $row['id'] . "\")'>Delete</button></a>
                    </td>
                </tr>
<div class='delete-confirm'>
<p id='deleteMessage'></p>
<button onclick='removeConfirm()'>Cancel</button><form method='POST'><button>Confirm</button><input type='hidden' value='".$row['id']."' name='id_delete'></form>
</div>
                ";
                }
            
            } else {
                echo "<p>No database found!</p>";
            }

if(isset($_POST['id_delete']) && $_SERVER['REQUEST_METHOD']=='POST') {
    $id = $_POST['id_delete'];
    $sql = "DELETE FROM session WHERE id = $id";
    $conn->query($sql);
    header("Location: index.php"); 
    exit;
}
            ?>

            </table>

        </div>  <!-- admin-container-->
        <a href='create.php'>Insert</a>
    </main>
    <footer>
<p>Your foot</p>
<p>Contact US</p>
<ul>
    <li>Email: <a href='#' style='background: none; box-shadow: none;'>rophejohn@gmail.com</a></li>
    <li>Contact: <img src='philippines.png' width='16px' height='12px'>  (63+)9927332957</li>
</ul>
<p id='rights'>© All rights Reserved</p><p>Blobs source not mine</p>
    </footer>
                <script>
                    function confirmDelete(idNum) {
                        const id = idNum;
                        document.querySelector('.delete-confirm').style.display = 'block';
                        document.querySelector('.overlay').style.display = 'block';
                        document.getElementById('deleteMessage').innerText = "Delete Student ID: " + id + " Permanently?";
                    }
                    function removeConfirm() {
                        document.querySelector('.delete-confirm').style.display = 'none';
                        document.querySelector('.overlay').style.display = 'none';                    
                    }
                </script>

</body>
</html>