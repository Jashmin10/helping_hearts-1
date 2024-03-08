<?php
include "commanpages/session.php";
include "commanpages/connection.php";
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="assets/images/helping.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/images/helping.png" type="image/x-icon">
  <title>Assign Form</title>
  <!-- Google font-->
  <link rel="preconnect" href="https://fonts.gstatic.com/">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <!-- Font Awesome-->
  <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="assets/css/icofont.css">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/themify.css">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/flag-icon.css">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/feather-icon.css">
  <!-- Plugins css start-->
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="assets/custome.css">

</head>

<body>
  <!-- Loader starts-->
  <?php include "commanpages/loader.php"; ?>
  <!-- Loader ends-->
  <!-- page-wrapper Start-->
  <div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <?php include "commanpages/header.php"; ?>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
      <!-- Page Sidebar Start-->
      <?php include "commanpages/sidemenu.php"; ?>
      <!-- Page Sidebar Ends-->
      <div class="page-body">
        <div class="container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col-sm-6">
                <h3>Assign Management</h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Donation</li>
                  <li class="breadcrumb-item active">Add Assign</li>
                </ol>
              </div>
              <div class="col-sm-6 text-end">
              <a href="assign_view.php"><button class="btn btn-outline-primary btn-sm" type="button">Back</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 col-xl-12">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    
                    <div class="card-body">
                      
                      <div class="card-body">
                      <?php
                if(isset($_GET['donationid'])){
                  $id = $_GET['donationid'];
                  $sql1 = "select * from tbl_donation
                  inner join tbl_user on tbl_donation.user_id=tbl_user.user_id where donation_id=$id;";
                  $res1=mysqli_query($conn,$sql1);
                  while($row = mysqli_fetch_assoc($res1)){
                    //$uid = $row["user_id"];
                    $unm = $row['name'];
                    $t = $row["items"];
                  }
                }
                
                ?>
              <form class="theme-form" id="_frm" method="post">
               
              <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputEmail3">Donator</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="user_id" type="text" value="<?php echo $unm?>" disabled/>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Donation</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="donation_id" type="text" value="<?php echo $t?>" disabled/>
                    
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Select Volunteers</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="vol_assign">
                    <option value="0" disabled selected>Please select Volunteer</option>

                      <?php
                      $sql1 = "select * from tbl_volunteers;";
                      $result = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                      while ($row = mysqli_fetch_assoc($result)) {
                        $nm = $row['vol_name'];
                        $id = $row['vol_id'];
                        echo "<option value=$id> $nm </option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" >Remark</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="remark" type="text" placeholder="Enter Remark">
                  </div>
                </div>
              <!-- </div> -->
                <?php

                  if (isset($_POST["btn_add"])) 
                  {
                    $vid = $_POST["vol_assign"];
                    $id = $_GET['donationid'];
                    $rmark = $_POST["remark"];
                     $sql = "insert into tbl_assign(vol_id,donation_id,vol_assign,remark) values ($vid,$id,'unavailable','$rmark');";
                     $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    //echo "Donation Assigned Successfully ".$vid . " " . $id . " " . $rmark;
                    echo "<script> window.location='assign_view.php'; </script>";

                    ?>
                    <!-- <script>alert("Donation Assigned Successfully "+ $vid + " " + $id + " " + $rmark);</script> -->
                  <?php

                  }
                ?>
            </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="btn_add">Assign</button>
                      <a href="assign_view.php" class="btn btn-secondary">Cancel</a>
                    </div>
                   
                    </form>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid Ends-->
      </div>
      <!-- footer start-->
      
    </div>
    <?php include "commanpages/footer.php"; ?>
  </div>
  <!-- latest jquery-->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <!-- feather icon js-->
  <script src="assets/js/icons/feather-icon/feather.min.js"></script>
  <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
  <!-- Sidebar jquery-->
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/config.js"></script>
  <!-- Bootstrap js-->
  <script src="assets/js/bootstrap/popper.min.js"></script>
  <script src="assets/js/bootstrap/bootstrap.min.js"></script>
  <!-- Plugins JS start-->
  <script src="assets/jquery.validate.min.js"></script>
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="assets/js/script.js"></script>
  <!-- login js-->
  <!-- Plugin used-->
</body>
<script>
  $(document).ready(function(){
      jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Letters only please"); 

jQuery.validator.addMethod("noSpace", function(value, element) {
        // Regular expression to check if the value has leading or trailing spaces
        var leadingTrailingSpaceRegex = /^\s+|\s+$/g;
        return !leadingTrailingSpaceRegex.test(value);
    }, "No leading or trailing space please and don't leave it empty");
    $("#_frm").validate({
      rules: {
        vol_assign:{
          required:true
        },
        remark: {
          required: true,
          noSpace :true,

        }
      },
      messages: {
        vol_assign:{
          required:"Please select volunteer"
        },
          remark:{
            required:"Blank is not allowed.",
            noSpace:"Space is not allowed"
          },
        }
  });
});
</script>
</html>