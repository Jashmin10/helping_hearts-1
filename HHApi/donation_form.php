<?php
include 'connection.php';
header('Content-Type: application/json');


$response=array();

    $uid = $_POST["user_id"];
    $type = $_POST["type"];
    $items = $_POST["items"];
    $description = $_POST["description"];
    $qty = $_POST["approxfood_inkg"];
    $img1 = $_FILES["img1"]["name"];
    $img2 = $_POST["img2"]["name"];
    $status = $_POST["status"];

    
  $ext = pathinfo($_FILES["img1"]["name"], PATHINFO_EXTENSION);
  $imgname1 = time() . '.' . $ext;
  $uploadDirectory = "../uploads/donation_img/";

  $ext = pathinfo($_FILES["img2"]["name"], PATHINFO_EXTENSION);
  $imgname2 = time() . time() .'.' . $ext;
  $uploadDirectory = "../uploads/donation_img/";


    $result=mysqli_query($conn,"insert into tbl_donation(user_id,type,items,img1,img2,description,approxfood_inkg,status) values ('$uid','$type', '$items', '$imgname1', '$imgname2', '$description', '$qty','$status')");

    if($result==true)
    {
  move_uploaded_file($_FILES["img1"]["tmp_name"], $uploadDirectory . $imgname1);
  move_uploaded_file($_FILES["img2"]["tmp_name"], $uploadDirectory . $imgname2);

       
        $response["status"]="Success";
        $response['message'] = "Donation Successfully."; 
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "Donation Fail"; 

    }
    echo json_encode($response);
?>