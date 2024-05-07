<?php

session_start();
include("connection.php");
$id = $_GET['id']; 
if($userprofile == true)
{

} 
else
{
    header('location:login.php');
}
$query ="DELETE from form where id='$id'";
$data = mysqli_query($conn,$query);

if($data)
{
    echo "<script>alert('Record Deleted!')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/website/demo.php"/>
    <?php
}
else echo "Failed";
?>