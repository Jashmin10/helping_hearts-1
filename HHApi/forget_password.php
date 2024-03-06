<?php
include 'connection.php';
header('Content-Type: application/json');

$response=array();

    $email=$_POST["email"];

    $result=mysqli_query($conn,"select * from tbl_user where email='$email'");

    if(mysqli_num_rows($result)<=0){
        $response['status']="Failure";
        $response['message']="Invalid user";

    }
    else
    {
        $response['status']="Success";
        $response['message']="Valid user";
        while($row=mysqli_fetch_assoc($result))
        {
            $response['mydata']=$row;
        }
    }

echo json_encode($response);
?>