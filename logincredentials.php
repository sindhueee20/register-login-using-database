<?php 
if(!isset($_POST['submit']))
{
 $username=$_POST['username'];

 $password=$_POST['password'];

$con=mysqli_connect("localhost:3306", "root", "", "basiclogin");

$var="SELECT * from register1 WHERE username='$username'AND password='$password'";

$result=mysqli_query($con, $var);

// $resultcheck=mysqli_num_rows($result);

if(mysqli_num_rows($result)>0)
{ 
  echo " You have logged in successfully... Thank you..!!!!";
}
else
{
  echo "details incorrect. please check..";
}
 }
 ?>
