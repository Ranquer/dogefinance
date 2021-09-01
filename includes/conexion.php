<?php
    $servername = "localhost";
    $username = "admin";
    $password = "admin";
    $dbname = "bd_dogefinance";
    session_start();
    $con = mysqli_connect(
        $servername, $username, $password, $dbname
    );
?>