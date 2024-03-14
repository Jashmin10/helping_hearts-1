<?php
include 'connection.php';

$response=array();
    
$donid = $_POST["donation_id"];
$volid=$_POST["vol_id"];

    $result=mysqli_query($conn,"update tbl_donation set status='done' where donation_id='$donid'"); 

    if($result==true)
    {
        $result=mysqli_query($conn,"update tbl_assign set vol_assign='available' where vol_id='$volid'"); 
        $response["status"]="Success";
        $response['message'] = "Successfully pickup donation and free foe another work."; 
        
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "No pickup list featch."; 

    }
    echo json_encode($response);
?>