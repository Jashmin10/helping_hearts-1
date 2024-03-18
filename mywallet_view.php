<?php 
include "commanpages/session.php";
include 'commanpages/connection.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet</title>
</head>
<body>
    
    <?php
    $sql = "select * from tbl_order";
    $res = mysqli_query($conn,$sql);
    $totalDonation=0;

        while($row = mysqli_fetch_assoc($res)) {
            $totalDonation +=  $row["donation_amount"];
            
        }
        echo "Total donation amount: Rs." . $totalDonation;
?>
</body>
</html>