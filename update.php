<!DOCTYPE html>
<html>
    <head>
        <title>Edit Accounts</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='style.css'>
        <style>
.select-wrapper {
    position: relative;
    display: inline-block; 
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    overflow: hidden; 
    margin: var(--font-size-p);
}
#name_confirm {
    appearance: none;
    -webkit-appearance: none; 
    -moz-appearance: none; 
    outline: none; 
    border: none;
    background: transparent;
    padding: 10px 30px 10px 10px; 
    font-size: 16px;
    color: #333;
    width: 100%;
    display: block; 
    cursor: pointer;
}
.select-arrow {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 8px 5px 0 5px;
    border-color: #777 transparent transparent transparent;
    pointer-events: none; 
}
.select-wrapper:hover {
    border-color: #888;
}
#name_confirm:focus + .select-arrow {
    border-color: #007bff transparent transparent transparent;
}

        </style>
    </head>
    <body>
        <main class='update-container'>
            <h4>Edit Account</h4>   
            <div class="admin-container">
                <div class="edit-container">
                    <form method='GET'>
                <p>Account Name</p><input type='text' name='account_name' required maxlength='20' style='margin-bottom: 1em;' autocomplete='off'>
                <button>Select</button>
                    </form> <br><br>
                <?php 
                if(isset($_GET['account_name']) && $_SERVER['REQUEST_METHOD']=='GET') {
                    $account = $_GET['account_name'];
                    echo "
                    <h3>Editing account: tr0ecolor<h3>
                    <form method='POST'>
                    <p>Account Name</p><input type='text' name='name' required maxlength='20' value='{$account}' autocomplete='off'>
                    <p>Add Time</p><input type='number' name='account_name' required value='0' min='1' max='999' maxlength='3'> <a id='minute'>Minute(s)</a>
                    <br>
                    <div class='select-wrapper'>
                        <select id='name_confirm'>
                            <option value='offline'>Offline</option>
                            <option value='online'>Online</option>
                        </select>
                        <div class='select-arrow'></div>
                    </div><br>
                    <button type-'reset'><a href='index.php' style='background: none; box-shadow: none;'>Cancel</a></button><button>Confirm Edit</button>
                    </form>
                    ";
                }
                ?>
                </div>
            </div>
            <a href='index.php'>Back to home</a>
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