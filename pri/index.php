<?php
    
    /*
     * @author LI Qi
     * The main page with the table of contracts
     * I use Bootstrap to design the item
     */
    
    //including the database connection file
    include_once("config.php");
    
    // select data in descending order
    
    $result = mysqli_query($mysqli, "SELECT * FROM Users ORDER BY id DESC");
    
    // search by sutudent's name
    if (isset($_POST['search'])){
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        
        if(empty($name) || empty($password)) {
            if(empty($name)) {
                echo '<script>alert("Name field is empty.");</script>';
            }
            else if(empty($password)) {
                echo '<script>alert("Password field is empty.");</script>';
            }
        }
        else{
            $result = mysqli_query($mysqli, "SELECT * FROM Users WHERE name='$name' ORDER BY id DESC");
            $num = mysqli_num_rows($result);
            session_start();
            
            if($num==0){
                // Get the type of error
                $_SESSION['find'] = "Application runs well! But There isnot such a user!";
                echo '<script type="text/javascript"> var mymessage=confirm("There isnot such a user! Do you want to inform the error?");if(mymessage==true){window.location.href="sent_find.php";}</script>';
            }
            else{
                $res = mysqli_fetch_array($result);
                $password_real= $res['password'];
                if($password_real==$password){
                    $_SESSION['find'] = "Application runs well! There is no problems";
                    echo '<script type="text/javascript"> var mymessage=confirm("The Application runs well! Do you want to inform the news?");if(mymessage==true){window.location.href="sent_find.php";}</script>';
                    
                }
                else{
                    // Get the type of error
                    $_SESSION['find'] = "Application runs well! But The Password is Wrong!";
                    echo '<script type="text/javascript"> var mymessage=confirm("The Password is Wrong! Do you want to inform the error?");if(mymessage==true){window.location.href="sent_find.php";}</script>';
                }
            }
        }
    }
    ?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <title>Contracts</title>
            </head>
    
    <body>
        
        <div style="margin-left:30px;margin-top:30px;padding-right:80%">
            <form action="index.php" method="post" name="form2">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="name">
                        </div>

                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                    </div>
                    <input type="text" name="password" class="form-control" aria-label="Sizing example input"  aria-describedby="inputGroup-sizing-default">
                        </div>

            <tr>
                <td></td>
                <button type="submit" name="search" class="btn btn-primary active" tabindex="-1" role="button" aria-pressed="true">Find</button>
            </tr>

            </form>
        </div>
        
        <h6 style="color:#003E3E;text-align:center;font-size:50px">Welcome to PRI Systeme!
        </h6>
        <div style="text-align:center;font-family:arial;font-size:26px">
            <a href="add_user.php" class="btn btn-primary active" tabindex="-1" role="button" aria-pressed="true">Add a New User</a><br/>
        </div>
        <hr>
        <div style="margin-left:20%;text-align: center;padding-right: 150px">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>

<?php
    
    $result = mysqli_query($mysqli, "SELECT * FROM Users ORDER BY id DESC");
    while($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['password']."</td>";
        echo "</tr>";
    }
    ?>

                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted" style="text-align:center;margin-top:20%">
            <p>
            @ 2019  All Rights Reserved<br>
            Copyright ownership belongs to LI Qi, shall not be reproduced , copied, or used in other ways without permission.
            </p>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

