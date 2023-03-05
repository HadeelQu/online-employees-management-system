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
  $emp_number = isset($_POST['id']) ? $_POST['id'] : '';
  $first_name = isset($_POST['fname']) ? $_POST['fname'] : '';
  $last_name = isset($_POST['lname']) ? $_POST['lname'] : '';
  $job_title = isset($_POST['job']) ? $_POST['job'] : '';
  $password = isset($_POST['psw']) ? $_POST['psw'] : '';

  $user_id = esignup($emp_number, $first_name, $last_name, $job_title, $password);

  if ($user_id > 0) {
    $_SESSION['user_logged'] = true;
    $_SESSION['user_id'] = $user_id;
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
    <title>Sign up</title>

    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/Esignup.css">
        <script src="js/Esignup.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!-- comment -->
        
        
        
</head>

<body>
  <header>

<div class="navbar">

  <img id="LOGO"  src="images/logo.png" height="70" alt="logo">
<a class="logo" href="index.php" accesskey="h">
<em>Superv<span>i</span>so</em></a>
<ul class="nav">

  <li><a href="index.php" accesskey="r">Home</a> </li>
<li><a href="login-manager.php" accesskey="m">Manager Login</a></li>

<li><a id="CurrentPage" href="login-emp.php" accesskey="m">Employee Login</a></li>
</a></li>

</ul>
</div>

</header>
    <main>
<form name="form" action="esignup.php" method="POST">
  <div class="container">

    <div class="sigmealstitle">

      <h1> Employee sign up Form </h1>

      <div class="underline"></div>

    </div>
    <label>First name: </label>
    <input type="text" placeholder="Enter First name" name="fname" required>
    <label>Last name: </label>
    <input type="text" placeholder="Enter Last name" name="lname" required>
    <label>Job title: </label>
    <input type="text" placeholder="Enter job title" name="job" required>
    <label>Employee ID: </label>
    <input type="text" placeholder="Enter Employee ID" name="id" required>
    <label>Password : </label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <input id="Button" type="button" value="sign up" onclick=" signup();return false;">

  <?php if ($success_msg) { ?>
        <div class="success-msg"><?php echo $success_msg; ?></div>
      <?php } else if ($error_msg) { ?>
        <div class="error-msg"><?php echo $error_msg; ?></div>
      <?php } ?>
  </div>
</form>
    </main>
    
<?php include("include/footer.php"); ?>