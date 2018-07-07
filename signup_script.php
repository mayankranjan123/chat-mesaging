<?php
require "includes/common.php";
if(isset($_POST['submit']))
{
$name =mysqli_real_escape_string($con,$_POST['name']);
$password=md5($_POST['password']);
$result=mysqli_query($con,"select  id from total where user='$name'") or die(mysqli_error($con));
if(mysqli_num_rows($result)>0)
{
    
    header("location:signup.php?invalid=Email already exists!");
}
    else
    {
$user_registration_query = "insert into total(user, password) values ('$name', '$password')";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
$_SESSION['id']=mysqli_insert_id($con);
$_SESSION['user']=$name;
header("location:index.php");
    }}
?>


