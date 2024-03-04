<?php
include 'connection.php';

$response = array();

if (isset($_POST["contact"]) && isset($_POST["pass"])) {
    $contact = $_POST["contact"];
    $pass = $_POST["pass"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE contact ='$contact' AND password='$pass'");
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $response['status'] = "Success";
            $response['message'] = "Valid User";
            $response['data'] = mysqli_fetch_assoc($result);
        } else {
            $response['status'] = "Failure";
            $response['message'] = "Invalid User";
        }
    } else {
        $response['status'] = "Error";
        $response['message'] = "Database query failed: " . mysqli_error($conn);
    }
} else {
    $response['status'] = "Error";
    $response['message'] = "Missing parameters";
}

echo json_encode($response);
?>
