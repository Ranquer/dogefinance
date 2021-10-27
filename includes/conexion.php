<?php
$servername = "localhost";
$username = "myadmin";
$password = "password";
$dbname = "bd_dogefinance";
session_start();
$con = mysqli_connect(
    $servername, $username, $password, $dbname
);
?>