<?php
      // Create database connection using config file
      include "./config/database.php";
      date_default_timezone_set('Asia/Jakarta');
      $time = date("Y-m-d H:i:s", time());
      $ip_address = gethostbyname("pemuda20.xyz");
      $get_visitor = mysqli_query($db, "SELECT ip_address FROM visitor WHERE ip_address = '$ip_address'");
      if(!mysqli_num_rows($get_visitor) > 0)
        $store_visitor = mysqli_query($db, "INSERT INTO visitor(ip_address)VALUES('$ip_address')");
      else
        $update_time = mysqli_query($db, "UPDATE visitor SET time = '$time' WHERE ip_address = '$ip_address'");
      $result = mysqli_query($db, "SELECT judul,logo,order_kontak FROM web_profile");
      $web = mysqli_fetch_array($result);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $web['judul']; ?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/darul-hijrah-web/uploaded_files/<?=$web['logo']?>" rel="icon">
  <link href="/darul-hijrah-web/uploaded_files/<?=$web['logo']?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Fontawesome File -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyBiz - v2.1.0
  * Template URL: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>