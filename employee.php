<?php
require_once('include/db_conn.php');
session_start();

include('include/functions.php');

if (!isset($_SESSION['user_logged'])){
  exit(header('Location:index.php'));
}else if ($_SESSION['is_manager']){
exit(header('Location:manager.php'));}

$user_id = $_SESSION['user_id'];
$user = getEmploeeInfo($user_id);
$in_progress_requests = getEmployeeInProgressRequests($user_id);
$previous_requests = getEmployeePreviousRequests($user_id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Employee</title>

    <link rel="stylesheet" href="css/style2.css">
     <link rel="stylesheet" href="css/EmStyle.css">
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
        

            
            
<div class="container">

  <p id="Welcome">
      
    Welcome <?php echo $user['first_name']; ?> <?php echo $user['last_name'] ;?> !
  </p>
  <p id="EmpInfo">
    Employee's ID: <?php echo $user['emp_number']; ?> <br>
    Job Title: <?php echo $user['job_title']; ?>
  </p>
  <p id="Add"> <a href="add-request.php"> +Add request </a> </p>
  <table>
    <caption id="Rcaption"> Requsets </caption>

    <thead>
      <tr>
        <th class="col" colspan="3">In progress</th>
      </tr>
    </thead>
    <tr id="Row"></tr>
    <tbody>
      <?php foreach ($in_progress_requests as $key => $request) { ?>
        <tr>
          <td><?php echo $request['id']; ?> - <a href="request-information-page.php?id=<?php echo $request['id']; ?>"><?php echo $request['service_type']; ?></a></td>
          <td id="Edit"> <a href="edit.php?id=<?php echo $request['id']; ?>"> Edit </a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <table>
    <thead>
      <tr>
        <th class="col" colspan="3">Previous Requests </th>
      </tr>
    </thead>
    <tr id="Row">
      <th>Requsets</th>
      <th colspan="2">Status</th>
    </tr>
    <tbody>
      <?php foreach ($previous_requests as $key => $request) { ?>
        <tr>
          <td><?php echo $request['id']; ?> - <a href="request-information-page.php?id=<?php echo $request['id']; ?>"><?php echo $request['service_type']; ?></a></td>
          <td><?php echo $request['status']; ?></td>
          <td id="Edit"> <a href="edit.php?id=<?php echo $request['id']; ?>"> Edit </a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</div>
  </main>
    
<?php include("include/footer.php"); ?>