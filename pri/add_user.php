<?php
    /*
     * @author LI Qi
     * This important php show the page to add a new contract
     */
    
    
    /*
     * mysql_connect is deprecated
     * So I use mysqli_connect to connect PHP anb MySql
     */
    
    $databaseHost = '127.0.0.1';
    // localhost and 127.0.0.1 are different here
    // but I don't konw the reason
    $databaseName = $_GET['database'];
    $databaseUsername = 'root';
    $databasePassword = 'Liqi8681,';
    
    error_reporting(0);
    // ignore the warning
    
    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    
    if(isset($_POST['Submit'])) {
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        
        // checking empty fields
        if(empty($name) || empty($password)) {
            
            if(empty($name)) {
                echo '<script>alert("Name field is empty.");</script>';
            }
            
            else if(empty($password)) {
                echo '<script>alert("Password field is empty.");</script>';
            }
            
            //link to the previous page
            echo '<script>self.history.back(-1);</script>';
        }
        else {
            // if all the fields are not empty
            
            //insert data to database
            $result = mysqli_query($mysqli, "INSERT INTO Users (password,name) VALUES ('$password','$name')");
            
            // return to the main page
            $url = 'users.php?database_name='.$databaseName;
            header('location: '.$url);
            
        }
    }
    ?>

<html>
    <head>
        <title>Add User</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </head>
    <body>
        <div style="margin-top:30px;margin-left:30px">
            <a href="users.php?database_name=<?php echo $databaseName ?>" class="btn btn-primary btn-sm active" tabindex="-1" role="button" aria-pressed="true">Home</a>
        </div>
        <br/><br/>
        
        <h1 style="font-family:cabri;color:#003E3E;text-align:center;font-size:40px">
            Add a New Contract
        </h1>
        <hr>
        
        <form enctype='multipart/form-data' action="add_user.php?database=<?php echo $databaseName?>" method="post" name="form1">
            <INPUT TYPE = "hidden" NAME = "MAX_FILE_SIZE" VALUE ="1000000">
                
                <div style="padding: 20px 500px 500px;">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                        </div>
                        <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                        </div>
                        <input type="text" name="password" class="form-control" aria-label="Sizing example input"  aria-describedby="inputGroup-sizing-default">
                            </div>
                    
                    <tr>
                        <td></td>
                        <button type="submit" name="Submit" class="btn btn-primary active" tabindex="-1" role="button" aria-pressed="true">Add</button>
                    </tr>
                    
                </div>
                </form>
    </body>
</html>
