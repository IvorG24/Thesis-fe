<?php
    $serverName = "127.0.0.1"; // or your server's IP address
    $username = "root"; // your MySQL username
    $password = ""; // your MySQL password
    $databaseName = "thesis-web"; // your database name

    // Create connection
    $conn = new mysqli($serverName, $username, $password, $databaseName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>