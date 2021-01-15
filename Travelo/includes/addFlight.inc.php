<?php
include_once'dbh.inc.php';

$number = $_POST['number'];
$airline = $_POST['airline'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$date = $_POST['date'];
$capacity = $_POST['capacity'];
$baggage = $_POST['baggage'];
$description = $_POST['description'];
$fare = $_POST['fare'];

$query = "SELECT flightNumber FROM flight WHERE flightNumber='$number'";
$result = mysqli_query($conn, $query)
    or die("Select query failed...!".'<br>'.mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

if(mysqli_affected_rows($conn)>0)
    header("Location: ../addFlight.php?addFlightmsg=failed");
else
{
    $query = "INSERT INTO flight VALUES ('$number', '$airline', '$source', '$destination', '$date', '$capacity', '0', '$baggage', '$description', '$fare')";
    $result = mysqli_query($conn, $query)
        or die("Insert query failed...!".'<br>'.mysqli_error($conn));
    header("Location: ../addFlight.php?addFlightmsg=success");
}


?>