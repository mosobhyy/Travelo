<?php
include_once'dbh.inc.php';
session_start();

if(isset($_POST['select']))
{

    $query = "SELECT * FROM `flight` WHERE `flightNumber`=$_POST[select]";
    $result = mysqli_query($conn, $query)
        or die("Select query failed...!".'<br>'.mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);

    foreach ($row as $field => $value)
        $_SESSION[$field] = $value;

    header("Location: ../updateFlight.php");
}
else if(isset($_POST['update']))
{
    if($_GET['flightNumber'] != $_POST['number'])
    {
        $query = "SELECT `flightNumber` FROM `flight` WHERE `flightNumber`=$_POST[number]";
        $result = mysqli_query($conn, $query)
            or die("Select query failed...!".'<br>'.mysqli_error($conn));
        if(mysqli_affected_rows($conn)>0)
        {
            header("Location: ../updateFlight.php?updateFlightmsg=failed");
            exit();
        }
    }
    $query = "UPDATE flight SET flightNumber = '$_POST[number]', airline = '$_POST[airline]', source = '$_POST[source]', destination = '$_POST[destination]', date = '$_POST[date]', capacity = '$_POST[capacity]', baggage = '$_POST[baggage]', description = '$_POST[description]', fare = '$_POST[fare]'
    WHERE flight.flightNumber = '$_GET[flightNumber]'";
    $result = mysqli_query($conn, $query)
        or die("Update query failed...!".'<br>'.mysqli_error($conn));
    $_SESSION['flightNumber'] = $_POST['number'];
    $_SESSION['airline'] = $_POST['airline'];
    $_SESSION['source'] = $_POST['source'];
    $_SESSION['destination'] = $_POST['destination'];
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['capacity'] = $_POST['capacity'];
    $_SESSION['baggage'] = $_POST['baggage'];
    $_SESSION['description'] = $_POST['description'];
    $_SESSION['fare'] = $_POST['fare'];
    header("Location: ../updateFlight.php?updateFlightmsg=success");
}

?>