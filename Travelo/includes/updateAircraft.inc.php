<?php
include_once'dbh.inc.php';
session_start();

if(isset($_POST['select']))
{

    $query = "SELECT * FROM `aircraft` WHERE `aircraftNumber`=$_POST[select]";
    $result = mysqli_query($conn, $query)
        or die("Select query failed...!".'<br>'.mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);

    foreach ($row as $field => $value)
        $_SESSION[$field] = $value;

    header("Location: ../updateAircraft.php");
}
else if(isset($_POST['update']))
{
    if($_GET['aircraftNumber'] != $_POST['number'])
    {
        $query = "SELECT `aircraftNumber` FROM `aircraft` WHERE `aircraftNumber`=$_POST[number]";
        $result = mysqli_query($conn, $query)
            or die("Select query failed...!".'<br>'.mysqli_error($conn));
        if(mysqli_affected_rows($conn)>0)
        {
            header("Location: ../updateAircraft.php?updateAircraftmsg=failed");
            exit();
        }
    }
    $query = "UPDATE aircraft SET aircraftNumber = '$_POST[number]', name = '$_POST[name]', airline = '$_POST[airline]', office = '$_POST[office]', contact = '$_POST[contact]', capacity = '$_POST[capacity]'
        WHERE aircraft.aircraftNumber = '$_GET[aircraftNumber]'";
    $result = mysqli_query($conn, $query)
        or die("Update query failed...!".'<br>'.mysqli_error($conn));
    $_SESSION['aircraftNumber'] = $_POST['number'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['airline'] = $_POST['airline'];
    $_SESSION['office'] = $_POST['office'];
    $_SESSION['contact'] = $_POST['contact'];
    $_SESSION['capacity'] = $_POST['capacity'];
    header("Location: ../updateAircraft.php?updateAircraftmsg=success");
}

?>