<?php
error_reporting(0);
    $servername = "localhost";
    $username = "root";
    $passowrd = "";
    $dbname = "responsiveform3";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if($conn)
    {
        // echo "Connected!!";
    }
    else
    {
        echo "Connection failed".mysqli_connect_error();
    }
?>