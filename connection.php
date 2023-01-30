<?php 
    $servername = "db-infinity-cluster.cluster-cbdmwkv9s6zp.eu-south-1.rds.amazonaws.com";
    $username = "amco";
    $password = "Amc0";
    $dbname = "amco_quiz";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
?>