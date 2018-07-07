<?php
require "includes/common.php";
if(isset($_POST['submit']))
{
$email = $_POST['email'];
$name =mysqli_real_escape_string($con,$_POST['name']);
$password=md5($_POST['password']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);
$address =mysqli_real_escape_string($con,$_POST['address']);
$city = mysqli_real_escape_string($con,$_POST['city']);
$result=mysqli_query($con,"select  id from users where email='$email'") or die(mysqli_error($con));
if(mysqli_num_rows($result)>0)
{
    
    header("location:signup.php?invalid=Email already exists!");
}
    else
    {
$user_registration_query = "insert into users(email,name, password, phone,address,city) values ('$email', '$name', '$password', '$phone','$address','$city')";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
$_SESSION['id']=mysqli_insert_id($con);
$_SESSION['email']=$email;
header("location:product.php");
    }}
?>


