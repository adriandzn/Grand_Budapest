<?php
    // Database Connection
    $servername="localhost";
    $username="root";
    $password="";
    $database="db_grandbudapest";

    $conn = new mysqli($servername, $username, $password, $database,3308);

    // // Check Error Connection
    // if (!$conn -> connect_error) {
    //     echo "Connected";
    // }
?>