<!DOCTYPE html>
<html>
    <head>
        <title>View Accounts</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='style.css'>
        <style>
.blob {position: relative; top:200px; z-index: -5; animation: angle 15s var(--angle-delay) infinite linear;}  
        </style>
    </head>    
    <body>
        <main>
            <div class="homepage"><h4>PC Cafe</h4></div>
                <div class="admin-container">
                    <div class="view-container">
                        <table border='1' cellpadding='5'>
                            <tr>
                                <th>ID</th>
                                <th>Account Name</th>
                                <th>Time Package</th>
                                <th>Running Time</th>
                                <th>Status</th>
                        </tr>
                            <?php 
                            echo "
                            <tr>
                                <td>999</td>
                                <td>tr0ecolor</td>
                                <td>1221 minutes</td>
                                <td>320 minutes</td>
                                <td style='color: red;'>Offline</td>
                            </tr>
                            ";
                            ?>
                        </table>
                    </div>
                    <button><a href='index.php' style='box-shadow: none; background: none;'>Back to home</a></button>
                </div> <!-- admin-container END-->
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