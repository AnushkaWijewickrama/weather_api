<?php
function getConnection() {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "weatherapp";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}

?>