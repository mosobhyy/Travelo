<?php
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "flightSystem";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName)
    or die("Database Connection failed...!".'<br>'.mysqli_connect_error());
?>