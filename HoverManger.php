<?php
header('Access-Control-Allow-Origin: *');
header('Cache-Control:public');

require_once('include/db_conn.php');

$RequestID=$_POST['RequestID'];

$SQL="SELECT description FROM request  WHERE id='".$RequestID."';";
$result=mysqli_query($conn, $SQL);

$description="";
while($row= mysqli_fetch_assoc($result)){
$description= $row;


}
$JSON= json_encode($description);
header('Content-Type: application/json');
print $JSON;
