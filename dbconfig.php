<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "db";

$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
    die("<script>alert('Connection Failed.')</script>");
}

?>