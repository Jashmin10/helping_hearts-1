<?php
include 'connection.php';
header('Content-Type: application/json');

<<<<<<< HEAD
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files 
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$response = array();

$email = $_POST["email"];

$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email='$email'");

if (mysqli_num_rows($result) <= 0) {
    $response['status'] = "Failure";
    $response['message'] = "Invalid user";
} else {
    $response['status'] = "Success";
    $response['message'] = "Valid user";
    
    while ($res = mysqli_fetch_assoc($result)) {
        $user_email = $res["email"];
       $user_password = $res["password"];
        
        // Create an instance; Pass `true` to enable exceptions 
        $mail = new PHPMailer;

        // Server settings 
        $mail->isSMTP();                            // Set mailer to use SMTP 
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers 
        $mail->SMTPAuth = true;                     // Enable SMTP authentication 
        $mail->Username = 'mahendra.patel9824039954';   // SMTP username 
        $mail->Password = 'fhqrctsrpbqtxmts';          // SMTP password 
        $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
        $mail->Port = 465;                          // TCP port to connect to 

        // Sender info 
        $mail->setFrom('mahendra.patel9824039954@gmail.com', 'HelpingHearts');
        $mail->addReplyTo('mahendra.patel9824039954@gmail.com', 'HelpingHearts');

        // Add a recipient 
        $mail->addAddress($user_email);

        // Set email format to HTML 
        $mail->isHTML(true);

        // Mail subject 
        $mail->Subject = 'Email from HelpingHearts';

        // Mail body content 
        $bodyContent = '<h1>Your Password from HelpingHearts</h1>';
        $bodyContent .= '<p>Your Password is: ' . $user_password . '</p>';
        $mail->Body = $bodyContent;

        // Send email 
        if (!$mail->send()) {
            $response['mail_status'] = 'Error';
            $response['error_message'] = $mail->ErrorInfo;
        } else {
            $response['mail_status'] = 'Success';
        }
    }
}

echo json_encode($response);
?>
=======
$response=array();

    $email=$_POST["email"];

    $result=mysqli_query($conn,"select * from tbl_user where email='$email'");

    if(mysqli_num_rows($result)<=0){
        $response['status']="Failure";
        $response['message']="Invalid user";

    }
    else
    {
        $response['status']="Success";
        $response['message']="Valid user";
        while($row=mysqli_fetch_assoc($result))
        {
            $response['mydata']=$row;
        }
    }

echo json_encode($response);
?>
>>>>>>> 071547f108ec4332edac78c0c0d0c4a77c728610
