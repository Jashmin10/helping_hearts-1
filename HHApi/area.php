<?php
include 'connection.php';
header('Content-Type: application/json');
$response=array();
    

    $result=mysqli_query($conn,"select * from tbl_area"); 

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "area is displayed"; 
        while($row = mysqli_fetch_assoc($result))
        {
            $response["data"][] = $row;
        }
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "area is not displayed";  

    }
    echo json_encode($response);
?>