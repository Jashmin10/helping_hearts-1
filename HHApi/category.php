<?php
include 'connection.php';

$response=array();
   


    $result=mysqli_query($conn,"select * from tbl_category");

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "Successfully get Category."; 
        while($row = mysqli_fetch_assoc($result))
        {
            $response['data'][] = $row;
        }
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "Sub Category is not found."; 

    }
    echo json_encode($response);
?>