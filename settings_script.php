<?php
require "includes/common.php";
 if(!isset($_SESSION['name']))
 {
header('location:login.php');
 }
else
{
   if(isset($_POST['submit']))
   {
       $original_email=$_SESSION['email'];
       $select_query_result=mysqli_query($con,'select *from users');
     while($row=mysqli_fetch_array($select_query_result))
     {
         if($row['email']==$_SESSION['email'])
         {
             $original_password=$row['password'];
             
         }
     }
       
echo $row['password'];
$old=md5($_POST['old']);
$new=md5($_POST['new']);       
$renew=md5($_POST['renew']);    
if($new==$renew)
{
    if($old==$original_password)
    {
$user_registration_query =  "UPDATE users SET password='$new' WHERE email='$original_email'";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
        header('location:settings_page.php?success=Password updated successfully!');
       
    
$_SESSION['id']=mysqli_insert_id($con);
    }
         else
       {
           header('location:settings_page.php?invalid=Password doesnt matches!');
       }
    
    

}
       else
       {
           header('location:settings_page.php?invalid=Password doesnt matches!');
       }
   }
}

