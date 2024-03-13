<?php
include 'connection.php';

$response=array();
    
   
$userid=$_POST["vol_id"];

    $result=mysqli_query($conn,"select * from tbl_assign inner join tbl_donation on tbl_assign.donation_id=tbl_donation.donation_id inner join tbl_user on tbl_donation.user_id=tbl_user.user_id where vol_id='$userid';"); 

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "Successfully get pickup list."; 
        while($row = mysqli_fetch_assoc($result))
        {
            $response["data"][] = $row;
        }
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "No pickup list featch."; 

    }
    echo json_encode($response);
?>