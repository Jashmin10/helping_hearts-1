<?php
include 'connection.php';

$response=array();
    $id = $_POST["vol_id"];
    $name=$_POST["vol_name"];
   


    $result=mysqli_query($conn,"select * from tbl_volunteers where $vol_id=$id"); 

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "Data display successfully"; 
        while($row = mysqli_fetch_assoc($result))
        {
            $response["data"][] = $row;
        }
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "Data Not Display"; 

    }
    echo json_encode($response);
?>