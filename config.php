<?php
    session_start();

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "pds"; 

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    // sge tim eroi
?>

