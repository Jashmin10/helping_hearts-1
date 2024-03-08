<?php
include 'connection.php';
header('Content-Type: application/json'); 

$responce=array();

$user_id=$_POST["user_id"];
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];

$result=mysqli_query($conn,"select * from tbl_user where user_id='$user_id'");

if(mysqli_num_rows($result)<=0)
{
    $response['status']="Failure";
    $response['message']="Invalid user name";
}
else
{
    mysqli_query($conn,"insert into tbl_user where name='$name', email='email',password='$password'");
    $response['status']="Success";
    $response['message']="Valid user name";
}

echo json_encode($responce);
?>