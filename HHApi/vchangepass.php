<?php
include 'connection.php';
header('Content-Type: application/json');

$response=array();

//$pass=$_POST["password"];
$userid=$_POST["userid"];
$oldpass=$_POST["oldpass"];
$newpass=$_POST['newpass'];


$result=mysqli_query($conn,"select * from tbl_volunteers where vol_id='$userid' and vol_pass='$oldpass'" )or die(mysqli_error($conn));

if(mysqli_num_rows($result)<=0){
    $response['status']="Failure";
    $response['message']="Invalid Current Password";
}
else
{

     mysqli_query($conn,"update tbl_volunteers set vol_pass='$newpass' where  vol_id='$userid' "); 
     $response['status']="Success";
     $response['message']="Valid Password";

// while(mysqli_fetch_assoc($result)){
//     $response['mydata']=$row;
// }
}

echo json_encode($response);
?>