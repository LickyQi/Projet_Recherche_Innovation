<?php
    
    /*
     * @author LI Qi
     * mysql_connect is deprecated
     * So I use mysqli_connect to connect PHP anb MySql
     */
    
    $databaseHost = '127.0.0.1';
    // localhost and 127.0.0.1 are different here
    // but I don't konw the reason
    $databaseName = 'pri';
    $databaseUsername = 'root';
    $databasePassword = 'Liqi8681,';
    
    error_reporting(0);
    // ignore the warning
    
    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    
    if(mysqli_connect_error())
    {
        session_start();
        
        // Get the type of error
        $_SESSION['error'] = mysqli_connect_error();
        
        echo('<script type="text/javascript">var mymessage=confirm("Can not connect with DataBase !\nDo you want to inform the error ?");if(mymessage==true) {window.location.href="sent_connect.php?";} </script>');
    }
    
    ?>
