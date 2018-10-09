<?php
  $server = "localhost";
    $username = "nutticom_data";
    $password = "12345";
    $db = "heroku_ce52199dd4f50e1";
    $conn = new mysqli($server, $username, $password, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_query($conn, "SET NAMES utf8");
	echo "connected !!!!!!";
 ?>