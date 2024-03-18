<?php
include 'connection.php';
header('Content-Type: application/json');

$response=array();

$userid=$_POST["vol_id"];
$volname=$_POST["vol_name"];
$contact=$_POST["contact"];



$result= mysqli_query($conn,"update tbl_volunteers set vol_name='$volname', contact='$contact'  where  vol_id='$userid' ") or die(mysqli_error($conn));

if($result==true){
    $response['status']="Success";
    $response['message']="Profile is successfully edited";
   
}
else
{

    $response['status']="Failure";
    $response['message']="Please enter proper data";


}

echo json_encode($response);
?>