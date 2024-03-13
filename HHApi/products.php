<?php
include 'connection.php';

$response=array();
   

$subcat_id = $_POST["subcat_id"];
    $result=mysqli_query($conn,"select * from tbl_products where subcat_id='$subcat_id'");

    if($result)
    {
        $response["status"]="Success";
        $response['message'] = "Successfully get all products"; 
        while($row = mysqli_fetch_assoc($result))
        {
            $response['data'][] = $row;
        }
    }
    else
    {
        $response["status"]="Failure";
        $response['message'] = "product is not found."; 

    }
    echo json_encode($response);
?>