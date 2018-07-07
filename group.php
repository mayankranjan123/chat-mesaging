<?php
require "includes/common.php";

if(isset($_POST['submit']))
{
$name = $_POST['user'];
$msg = $_POST['message'];
$name =mysqli_real_escape_string($con,$_POST['user']);
$msg =mysqli_real_escape_string($con,$_POST['message']);
$user_registration_query = "insert into users(name,message) values ('$name','$msg')";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
$_SESSION['id']=mysqli_insert_id($con);
$_SESSION['name']=$name;
 header("location:index.php#group");
    }
?>


