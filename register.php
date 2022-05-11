<?php

$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$email  = $_POST['email'];




if (!empty($username)  || !empty($password) || !empty($password1) || !empty($email))
{


$conn = new mysqli ("localhost", "root", "", "basiclogin");

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
$SELECT = "SELECT email From register Where email = ? Limit 1";

$INSERT = "INSERT Into register1 (username ,  password, password1, email )values(?,?,?,?)";

$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $email);  //s for varchar i for interger
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum = $stmt->num_rows;


if ($rnum==0)
{
$stmt->close();
$stmt = $conn->prepare($INSERT);

$stmt->bind_param("ssss", $username,$password,$password1,$email);
$stmt->execute();

echo "Record inserted sucessfully";
}
else 

{

echo "Email already registered";

}

$stmt->close();

$conn->close();
}

} 

else {
 echo "All field are required";
 die();
}
?>