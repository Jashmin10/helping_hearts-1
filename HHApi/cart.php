<?php
include 'connection.php';

$response=array();
    $pid = $_POST["product_id"];
    $uid = $_POST["user_id"];
    $qty = $_POST["qty"];


    $result=mysqli_query($conn,"insert into tbl_cart(product_id,user_id,qty) values ('$pid','$uid', '$qty')");

    if($result==true)
    {
        $response["status"]="Success";
        $response['message'] = "You added the product."; 
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "product not added"; 

    }
    echo json_encode($response);
?>