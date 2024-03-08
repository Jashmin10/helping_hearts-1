<?php
include 'connection.php';

$response=array();
   

$cat_id = $_POST["cat_id"];
    $result=mysqli_query($conn,"select * from tbl_subcategory cat_id='$cat_id'");

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "Successfully get Sub Category"; 
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