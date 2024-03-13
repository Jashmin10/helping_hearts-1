<?php
include 'connection.php';

$response = array();
$uid = $_POST["user_id"];
$address = $_POST["address"];
$landmark = $_POST["landmark"];
$pincode = $_POST["pincode"];
$city_id = $_POST["city_id"];
$total_payment = $_POST["total_payment"];
$donation_amount = $_POST["donation_amount"];
$payment_id = $_POST["payment_id"];
$status = $_POST["status"];
// $offer_id = $_POST["offer_id"];


$result = mysqli_query($conn, "insert into tbl_order(user_id,address,landmark,pincode,city_id,total_payment,donation_amount,payment_id,status) values 
    ('$uid','$address', '$landmark','$pincode','$city_id','$total_payment','$donation_amount','$payment_id','$status')");

//print_r($result);

if ($result == true) {
    $response["status"] = "Success";
    $response['message'] = "Order place Successfully ";
     $result = mysqli_query($conn,"delete from tbl_cart  where user_id='$uid'"); 
     

} else {
    $response["status"] = "Failure";
    $response['message'] = "Order is fail";
}
echo json_encode($response);
