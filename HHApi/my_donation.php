<?php
include 'connection.php';

$response=array();
    $id = $_POST["id"];
   


    $result=mysqli_query($conn,"select * from tbl_donation where user_id= '$id'"); 

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "All Donation list Successfully Displayed."; 
        while($row = mysqli_fetch_assoc($result))
        {
            $response["data"][] = $row;
        }
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "Donation list Not Display"; 

    }
    echo json_encode($response);
?>