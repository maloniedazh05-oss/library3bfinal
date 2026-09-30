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