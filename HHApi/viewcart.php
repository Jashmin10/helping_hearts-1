<?php
include 'connection.php';

$response=array();
    $id = $_POST["id"];
   


    $result=mysqli_query($conn,"select * from tbl_cart as c left join tbl_products as p on c.product_id=p.product_id where user_id='$id'");

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "Successfully Registered. Please Login to Continue."; 
        while($row = mysqli_fetch_assoc($result))
        {
            $response["data"][] = $row;
        }
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "Registration is fail"; 

    }
    echo json_encode($response);
?>