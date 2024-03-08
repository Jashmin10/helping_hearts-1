<?php
include 'connection.php';

$response=array();
   


    $result=mysqli_query($conn,"select * from tbl_category");

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "Successfully Registered. Please Login to Continue."; 
        while($row = mysqli_fetch_assoc($result))
        {
            $response['data'][] = $row;
        }
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "Registration is fail"; 

    }
    echo json_encode($response);
?>