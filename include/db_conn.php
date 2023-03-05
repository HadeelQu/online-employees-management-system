<?php

$host = "localhost";
$database = "superviso";
$user = "root";
$pass = "root";

$error_msg = false;
$success_msg = false;

$conn = new mysqli($host, $user, $pass, $database);

$error= mysqli_connect_error();
if ($error != null ) {
    $output="Failed to connect to MySQL: ";
    exit($output);
}
?>