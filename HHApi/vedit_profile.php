<?php
include 'connection.php';

$response=array();
$vid=$_POST["vol_id"];

    $result=mysqli_query($conn,"select * from tbl_volunteers where vol_id='$vid'"); 

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "All Details Successfully Displayed."; 
        while($row = mysqli_fetch_assoc($result))
        {
            $response["data"][] = $row;
        }
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "Details Not Display"; 

    }
    echo json_encode($response);
?>