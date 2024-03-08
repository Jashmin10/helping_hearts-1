<?php
include 'connection.php';

$response=array();
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    $result=mysqli_query($conn,"insert into tbl_user(name,email,password) values ('$name','$email', '$password')");

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "Successfully Registered. Please Login to Continue."; 
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "Registration is fail"; 

    }
    echo json_encode($response);
?>