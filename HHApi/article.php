<?php
include 'connection.php';

$response=array();
   


    $result=mysqli_query($conn,"select * from tbl_article");

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "All article Successfully display."; 
        while($row = mysqli_fetch_assoc($result))
        {
            $response['data'][] = $row;
        }
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "article is not found."; 

    }
    echo json_encode($response);
?>