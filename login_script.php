<?php
$con=mysqli_connect("localhost","root","","message") or die(mysqli_error($con));
session_start();
if(isset($_POST['login']))
{
$email=$_POST['name'];
$password=md5($_POST['password']);
$email=stripcslashes($email);
$password=stripcslashes($password);
$email=mysqli_real_escape_string($con,$email);
$password=mysqli_real_escape_string($con,$password);
$result=mysqli_query($con,"select *from total where user='$email' and password='$password'") or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
if($row['user']==$email && $row['password']==$password)
{
   $_SESSION['user']=$email;
    header("location:index.php");
}
else
{
    header("location:login.php?invalid=Invalid email or password!");
}}
?>