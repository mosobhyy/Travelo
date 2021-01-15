<?php
include_once'dbh.inc.php';

$number = $_POST['number'];
$name = $_POST['name'];
$airline = $_POST['airline'];
$office = $_POST['office'];
$contact = $_POST['contact'];
$capacity = $_POST['capacity'];

$query = "SELECT `aircraftNumber` FROM `aircraft` WHERE `aircraftNumber`='$number'";
$result = mysqli_query($conn, $query)
    or die("Select query failed...!".'<br>'.mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

if($row['aircraftNumber'] == $number)
    header("Location: ../addAircraft.php?addAircraftmsg=failed");

else
{
    $query = "INSERT INTO `aircraft` VALUES ('$number', '$name', '$airline', '$office', '$contact', '$capacity')";
    $result = mysqli_query($conn, $query)
            or die("Insert query failed...!".'<br>'.mysqli_error($conn));
    header("Location: ../addAircraft.php?addAircraftmsg=success");
}


?>