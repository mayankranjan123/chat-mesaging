<?php
require "includes/common.php";

if(isset($_POST['submit']))
{
$name = $_POST['userName'];
$name =mysqli_real_escape_string($con,$_POST['userName']);
$result=mysqli_query($con,"select  id from addpeople where name='$name'") or die(mysqli_error($con));
if(mysqli_num_rows($result)>0)
{
    
    header("location:signup.php?invalid=Email already exists!");
}
    else
    {
$user_registration_query = "insert into addpeople(name) values ('$name')";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
$_SESSION['id']=mysqli_insert_id($con);
$_SESSION['name']=$name;
 header("location:index.php#intro");
    }}
if(isset($_POST['remove']))
{
   $result=mysqli_query($con,"select  id from addpeople") or die(mysqli_error($con));
    while($row=mysqli_fetch_array($result))
{
        $id=$row['id'];
        $sql = "DELETE FROM addpeople WHERE ID='$id'";
if(mysqli_query($con, $sql)){
     header("location:index.php#intro");
} 
else{
    echo "ERROR: Could not able to execute $sql. " 
                                   . mysqli_error($con);
}
mysqli_close($con);
    
    
} 
}
?>


