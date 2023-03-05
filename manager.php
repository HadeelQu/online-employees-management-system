<?php
require_once('include/db_conn.php');
session_start();
include('include/functions.php');

if (!isset($_SESSION['user_logged']))
  exit(header('Location:index.php'));
else if (!$_SESSION['is_manager'])
  exit(header('Location:employee.php'));

$user_id = $_SESSION['user_id'];
$user = getManagerInfo($user_id);

$services = getServices();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manager</title>

    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="requestInfo.js"></script><!-- comment -->
      <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->

<style>
  .container {
    top: 60%;
  }
  
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
            <a class="logo" href="index.php" accesskey="h"><em>Superv<span>i</span>so</em></a><!-- comment -->
              <a id="Button" href="signout.php"> Sign Out</a>
             </div>
         \

    </header>
    <main>
        
   
<div class="container">

  <p id="Welcome">
    Welcome <?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?> !
  </p>
  <h2 id="Rcaption"> Requsets </h2>

  <?php foreach ($services as $key => $service) { ?>
    <table>
      <thead>
        <tr>
          <th class="col" colspan="3"><?php echo $service['type']; ?></th>
        </tr>
      </thead>
      <tr id="Row">
        <th>Requsets</th>
        <th colspan="2">Status</th>
      </tr>
      <tbody>
        <?php
        $requests = getRequestsByServiceType($service['id']);
        if ($requests) {
        ?>

          <?php foreach ($requests as $key => $request) { ?>
            <?php if ($request['status'] == 'In progress') { ?>
              <tr  id="c<?php echo $request['id'];?>"style="background-color: rgba(150,150,150,0.5);font-style: italic;">
                 <td><a onmouseover="Hover(<?php echo $request['id'];?>)" class="RequestD" href="request-information-page.php?id=<?php echo $request['id']; ?>"><abbr class="Title" title=""><?php echo $request['id']; ?>-<?php echo $request['emp_first_name']; ?> <?php echo $request['emp_last_name']; ?></a></abbr></td>
                <td id="s<?php echo $request['id'];?>" ><?php echo $request['status']; ?></td>
                <td id="<?php echo $request['id']; ?>"><input class="Approve" type="button" value="Approve" onClick="approveReq(<?php echo $request['id']; ?>)"><input class="Decline" type="button" value="Decline" onClick="declineReq(<?php echo  $request['id']; ?>)"></td>
              </tr>
            <?php } ?>
          <?php } ?>
          <?php foreach ($requests as $key => $request) { ?>
            <?php if ($request['status'] != 'In progress') { ?>
              <tr >
                <td><a onmouseover="Hover(<?php echo $request['id'];?>)" class="RequestD" href="request-information-page.php?id=<?php echo $request['id']; ?>"><abbr class="Title" title=""><?php echo $request['id']; ?>-<?php echo $request['emp_first_name']; ?> <?php echo $request['emp_last_name']; ?></a></abbr></td>
                <td id="s<?php echo $request['id']; ?>"><?= $request['status'] ?></td>
                <?php if ($request['status'] == 'Approved') { ?>
                  <td id="<?php echo $request['id']; ?>"><input class="Decline" type="button" value="Decline" onClick="declineReq(<?php echo $request['id']; ?>)"></td>
                <?php } else { ?>
                  <td id="<?php echo $request['id']; ?>"><input class="Approve" type="button" value="Approve" onClick="approveReq(<?php echo $request['id']; ?>)"></td>
                <?php } ?>
              </tr>
            <?php } ?>
          <?php } ?>
        <?php } else { ?>
          <tr>
            <td>No requests</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } ?>

</div>
 </main>
<?php include("include/footer.php"); ?>