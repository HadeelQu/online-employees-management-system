<?php
require_once('include/db_conn.php');
session_start();
include('include/functions.php');

if (isset($_SESSION['user_logged'])) {
  if ($_SESSION['is_manager']){
    exit(header('Location:manager.php'));
  }else{
    exit(header('Location:employee.php'));
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>

    <link rel="stylesheet" href="css/style2.css">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .logo {
            font-size: 24px;
            position: relative;
            left: 1.3%;
        }
    </style>

</head>

<body>
    <header>

        <div class="navbar">
            <img id="LOGO" src="images/logo.png" height="70" alt="logo">
            <a class="logo" href="index.php" accesskey="h"><em>Superv<span>i</span>so</em></a>
            
              </div>

    </header>
    <main>
    
    
    
<div class="sigmeals">

  <div class="sigmealstitle">
    <h1>To Log-in </h1>
    <div class="underline"></div>
  </div>

  <div class="sigbox-container">

    <div class="s-box">
      <img src="images/employeee.png" id="img1" alt="Meal1">
      <a href="login-emp.php" class="ordbtn">Employee</a>
    </div>

    <div class="s-box">
      <img src="images/employee.png" id="img2" alt="Manager">
      <a href="login-manager.php" class="ordbtn">Manager</a>
    </div>

  </div>

  <p id="Sign"> New Employee? <a href="esignup.php">Sign-up </a> </p>

</div>
</main>
<?php include("include/footer.php"); ?>