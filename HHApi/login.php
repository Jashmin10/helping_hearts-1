<?php
include 'connection.php';
// Set response header to specify JSON content
header('Content-Type: application/json');

$response = array();


    $contact = $_POST["contact"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE contact ='$contact' AND password='$password'");
   
        if (mysqli_num_rows($result) <= 0) {
            $response['status'] = "Failure";
            $response['message'] = "Invalid User";
           
        } else {
            $response['status'] = "Success";
            $response['message'] = "Valid User";
            while($row = mysqli_fetch_assoc($result))
            {
                $response['mydata'] = $row;
            }
           
        }
   

echo json_encode($response);
?>
