<?php
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
require_once('include/db_conn.php');

if(isset($_POST['rid'])){
$id=$_POST['rid'];
if(isset($_POST['status'])){
$st=$_POST['status'];
$udate="UPDATE request set status='$st' where id='$id'";
$result=mysqli_query($conn, $udate);
if($result){
   if($st=="Approved"){
            echo 'approve';
   }
   else{
       echo 'declin';
  
        
}
}}

   }





