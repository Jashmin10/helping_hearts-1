<?php
include 'connection.php';
// Set response header to specify JSON content
header('Content-Type: application/json');

$response = array();


    $contact = $_POST["contact"];
    $vol_pass = $_POST["vol_pass"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_volunteers WHERE contact ='$contact' AND vol_pass='$vol_pass'");
   
        if (mysqli_num_rows($result) <= 0) {
            $response['status'] = "Failure";
            $response['message'] = "Invalid Volunteer";
           
        } else {
            $response['status'] = "Success";
            $response['message'] = "Valid Volunteer";
            while($row = mysqli_fetch_assoc($result))
            {
                $response['mydata'] = $row;
            }
           
        }
   

echo json_encode($response);
?>
