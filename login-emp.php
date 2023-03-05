<?php
session_start();
require_once('include/db_conn.php');

include('include/functions.php');

if (isset($_SESSION['user_logged'])) {
  if ($_SESSION['is_manager']){
    exit(header('Location:manager.php'));
  }else{
  exit(header('Location:employee.php'));}
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $emp_number = isset($_POST['uname']) ? $_POST['uname'] : '';
  $password = isset($_POST['psw']) ? $_POST['psw'] : '';

  $user_id = loginEmployee($emp_number, $password);

  if ($user_id > 0) {
    $_SESSION['user_logged'] = true;
    $_SESSION['user_id'] = $user_id;//the id of the DB -->$_SESSION['user_id'] 
    echo $user_id;
    $_SESSION['is_manager'] = false;
    header("location:employee.php");
    exit();
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login Employee</title>

    <link rel="stylesheet" href="css/style2.css">
      <link rel="stylesheet" href="css/login.css">
        <script src="js/logimEm.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .container {
    position: relative;
    left: 42%;
    width: 80%;
    -webkit-transform-origin-x: unset;
    transform: unset;
  }
</style>

</head>

<body>
    <header>

        <div class="navbar">
            <img id="LOGO" src="images/logo.png" height="70" alt="logo">
            <a class="logo" href="index.php" accesskey="h"><em>Superv<span>i</span>so</em></a>

               <ul class="nav">
                    <li><a href="index.php" accesskey="r">Home</a> </li></a></li>
                </ul>
              </div>

    </header>
    <main>
<div class="container2">
  <form name="form" action="login-emp.php" method="POST">
    <div class="container">

      <div class="sigmealstitle">
        <h1> Employee Login Form </h1>
        <div class="underline"></div>
      </div>

      <label>Employee ID: </label>
      <input type="text" placeholder="Enter your ID" name="uname" required>
      <label>Password : </label>
      <input type="password" placeholder="Enter your Password" name="psw" required>
      <input id="Button" type="button" value="login" onclick=" login();return false;"> <br> <br>
      <input type="checkbox" checked="checked"> Remember me
      <br><br>
      <a href="#"> Forgot password? </a>
      
  <?php if ($success_msg) { ?>
        <div class="success-msg"><?php echo $success_msg; ?></div>
      <?php } else if ($error_msg) { ?>
        <div class="error-msg"><?php echo $error_msg; ?></div>
      <?php } ?>
    </div>



  </form>
</div>

</main>
    
    <?php include("include/footer.php"); ?>