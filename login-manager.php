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
  $username = isset($_POST['uname']) ? $_POST['uname'] : '';
  $password = isset($_POST['psw']) ? $_POST['psw'] : '';

  $user_id = loginManager($username, $password);

  if ($user_id > 0) {
    $_SESSION['user_logged'] = true;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['is_manager'] = true;
    header("location:manager.php");
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login Manager</title>

    <link rel="stylesheet" href="css/style2.css">

        <link rel="stylesheet" href="css/login.css">
        <script src="js/login.js"></script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .logo {

    font-size: 24px;
    position: relative;
    left: 1.3%;
  }
 li a{
   color: black;
    text-decoration: none;
    position: relative;
    right: 30px;
  }
  li{
    
    list-style: none;
    list-style-type: none;
    padding: 10px;
}
</style>

</head>

<body>
    <header> 
 
        <div class="navbar">
            <img id="LOGO" src="images/logo.png" height="70" alt="logo">
            <a class="logo" href="index.php" accesskey="h"><em>Superv<span>i</span>so</em></a>
           
         <li><a href="index.php" accesskey="r">Home</a> </li>
                    <li><a id="CurrentPage" href="login-manager.php" accesskey="m">Manager Login</a></li>
                    <li><a href="login-emp.php" accesskey="m">Employee Login</a></li>
          
      </div>

    </header>
    <main>
        
   
<div class="container2">
  <form name="form" action="login-manager.php" method="POST">
    <div class="container">
      <div class="sigmealstitle">
        <h1> Manger Login Form </h1>
        <div class="underline"></div>
      </div>

      <label>Username: </label>
      <input type="text" placeholder="Enter your Username" name="uname" required>
      <label>Password : </label>
      <input type="password" placeholder="Enter your Password" name="psw" required>
      <input id="Button" type="button" value="login" onclick=" login();return false;"> <br><br>
      <input type="checkbox" checked="checked"> Remember me <br>
      <br>
      Forgot <a style="color: blue" href="#"> password? </a>

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