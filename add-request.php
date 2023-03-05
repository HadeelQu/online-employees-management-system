<?php
require_once('include/db_conn.php');
session_start();
include('include/functions.php');

if (!isset($_SESSION['user_logged'])){
  exit(header('Location:index.php'));
}else if ($_SESSION['is_manager']){
  exit(header('Location:manager.php'));
}
$user_id = $_SESSION['user_id'];
$user = getEmploeeInfo($user_id);

$services = getServices();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $service_type = isset($_POST['service_type']) ? $_POST['service_type'] : '';
  $description = isset($_POST['description']) ? $_POST['description'] : '';

  $next_id = getNextID("Request");

  $uploaded = true;
  $files = array_filter($_FILES['myfile']['name']); 
  
  $total_count = count($_FILES['myfile']['name']);

  for ($i = 0; $i < $total_count; $i++) {

    $tmpFilePath = $_FILES['myfile']['tmp_name'][$i];

    if ($tmpFilePath != "") {
      if (!file_exists("./upload_files/" . $next_id)) {
        mkdir("./upload_files/" . $next_id, 0777, true);
      }
    
      $newFilePath = "./upload_files/" . $next_id . "/" . $_FILES['myfile']['name'][$i];
     
       
      if (move_uploaded_file($tmpFilePath, $newFilePath)) {
   
        $files[$i] = $newFilePath;
      } else {
        $uploaded = false;
        $error_msg = "Can not upload files.";
      }
    }
  }

  if ($uploaded) {
    $request_id = addRequest($user_id, $service_type, $description, $files);
    if ($request_id > 0) {
      header("location:request-information-page.php?id=$request_id&msg=success");
      exit();
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Request</title>

    <link rel="stylesheet" href="css/style2.css">
 <link rel="stylesheet" href="css/AddRequisr.css">
        <script src="js/AddRequest.js"></script>
        
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
    
    
<div class="container2">
  <form name="form" id="form" enctype="multipart/form-data" method="post">
    <div class="container">
      <div class="sigmealstitle">
        <h1> Add New Request </h1>

        <div class="underline"></div>
      </div>

      <label>Service type: <span>*</span></label>
      <select id="service_type" name="service_type" style="width: 100%; height: 30px; margin: 0" required>
        <?php foreach ($services as $service) { ?>
          <option value="<?php echo $service['id']; ?>"><?php echo $service['type']; ?></option>
        <?php } ?>
      </select>

      <label>Description : </label>

      <textarea name="description" placeholder="Write a description for your request" required></textarea>
      <style>
        textarea {
          width: 100%;
          height: 150px;
          padding: 12px 20px;
          box-sizing: border-box;
          border: 2px solid #ccc;
          border-radius: 4px;
          background-color: #f8f8f8;
          font-size: 16px;
          resize: none;
        }
      </style>
      <br> <br>
      <label for="service" class="Tit"> Attachments: </label><br>
      <label for="myfile">Select files:</label>
      <input type="file" id="myfile" name="myfile[]" multiple="multiple">
      <br> <br>

      <input id="Button" type="button" value="Request" onclick="addRequest();return false;">

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