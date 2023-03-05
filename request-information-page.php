<?php
require_once('include/db_conn.php');
session_start();
include('include/functions.php');

if (!isset($_SESSION['user_logged']))
  exit(header('Location:index.php'));

if ($_SESSION['is_manager']) {
  $user_type = "manager";
} else {
  $user_type = "employee";
}

$user_id = $_SESSION['user_id'];

if ($user_type == "manager") {
  $user = getManagerInfo($user_id);
} else {
  $user = getEmploeeInfo($user_id);
}

$request_id = 0;
$request = false;

if (isset($_GET['id'])) {
  $request_id = $_GET['id'];
  $request = getRequestInfo($request_id);
}

if (isset($_GET['action'])) {
  if ($user_type == "manager") {
    $action = $_GET['action'];

    if ($action == "approve") {
      $result = approveRequest($request_id);
      $_SESSION['StatusMSG']="The request approved Successfully";
    } else if ($action == "decline") {
      $result = declineRequest($request_id);
        $_SESSION['StatusMSG']="The request declined Successfully";
    }

    if ($result) {
      header('Location: '.$_SERVER['HTTP_REFERER']);
      exit();
    }
  }
}

if (isset($_GET['emsg']) && $_GET['emsg'] == "success")
  $success_msg = "The request has been updated successfully.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Request Infotmation Page</title>

    <link rel="stylesheet" href="css/style2.css">
      <link rel="stylesheet" href="css/requestinfo.css">
      <script src="requestinfo2.js"></script>
      
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
              <a id="Button" href="signout.php"> Sign Out</a>
                </div>

    </header>
      
      
      
<main>

 
      <?php if (isset($_SESSION['StatusMSG'])) { ?>
        <div class="success-msg"><?php echo $_SESSION['StatusMSG']; ?></div>
      <?php } else if ($error_msg) { ?>
        <div class="error-msg"><?php echo $error_msg; ?></div>
      <?php } ?>
        <?php unset($_SESSION['StatusMSG']);?>

  <form id="editfForm" name="FormE">
    <fieldset>
      <legend id="edit">
        Request information
      </legend>
      <br>

      <?php if ($request) { ?>

        <label for="service" class="Tit"> Service Type </label><br>
        <p> <?php echo $request['service_type'] ;?> </p>
        <br>

        <label for="service" class="Tit"> Status</label><br>
        <p><?php echo $request['status']; ?></p>
        <br>

        <label for="service" class="Tit"> Employee Name </label><br>
        <br>
        <p><?php echo $request['emp_first_name']; ?> <?php echo $request['emp_last_name'] ;?></p>
        <br>

        <label for="service" class="Tit"> Description </label><br>
        <br>
        <p><?php echo $request['description']; ?></p>
        <br>

        <label for="service" class="Tit"> Attachments: </label><br>
        <br>
        <?php
        if($request['attachment1'] != ''){
        if (@is_array(getimagesize($request['attachment1']))) { ?>
          <img height="150" width="150" src="<?php echo $request['attachment1'] ;?>">
        <?php } else { ?>
          <a id="doc" target="_blank" href="<?php echo $request['attachment1']; ?>" download><img id="Doc" height="20" width="20" src="images/documents.png"> View The File</a> <br><br>
        <?php } ?>
         <?php } ?>
        <?php 
        if($request['attachment2'] != ''){
          if (@is_array(getimagesize($request['attachment2']))) { ?>
          <img height="150" width="150" src="<?php echo $request['attachment2'] ;?>">
        <?php } else { ?>
          <a id="doc" target="_blank" href="<?php echo $request['attachment2']; ?>" download><img id="Doc" height="20" width="20" src="images/documents.png"> View The File</a> <br><br>
        <?php } ?>
          <?php } ?>

        <br>
        <br>

        <div class="buttons">
          <?php if ($user_type == "manager") { ?>
            <?php if ($request['status'] == 'In progress' || $request['status'] == 'Decline') { ?>
        <input class="btn" type="button" value="Approve" onClick="approveReq(<?php echo $request['id']; ?>)">
            <?php } ?>
            <?php if ($request['status'] == 'In progress' || $request['status'] == 'Approved') { ?>
              <input type="button" class="btn" id="decline" value="Decline" onClick="declineReq(<?php echo $request['id']; ?>)">
            <?php } ?>
          <?php } else { ?>
            <input type="button" class="btn" id="edit" value="Edit" onClick="Editreq(<?php echo $request['id']; ?>)">
          <?php } ?>
        </div>

      <?php } else { ?>
        <p> request not found </p>
      <?php } ?>

    </fieldset>
  </form>



</main>

<?php include("include/footer.php"); ?>