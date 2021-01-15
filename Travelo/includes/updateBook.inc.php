<?php
include_once'dbh.inc.php';
session_start();

if(isset($_POST['update']))
{

    $query = "UPDATE cart SET seatClass = '$_POST[seatClass]', seatNumber = '$_POST[seatNumber]' 
    WHERE cart.flightNumber = '$_GET[flightNumber]'";
    $result = mysqli_query($conn, $query)
        or die("Select query failed...!".'<br>'.mysqli_error($conn));
    $msg = "updated";
}
else
{
    $query = "DELETE FROM cart WHERE cart.flightNumber = '$_GET[flightNumber]'";
    $result = mysqli_query($conn, $query)
        or die("Delete query failed...!".'<br>'.mysqli_error($conn));

    /* Minus One From Reserved Column in Flight Table */

    $query = "UPDATE flight SET reserved = reserved-1 WHERE flight.flightNumber = '$_GET[flightNumber]'";
    $result = mysqli_query($conn, $query)
        or die("Update query failed...!".'<br>'.mysqli_error($conn));

    /*  Get Flight Informaion to sent in email    */

    $query = "SELECT * FROM `flight` WHERE flight.flightNumber = '$_GET[flightNumber]'";
    $result = mysqli_query($conn, $query)
        or die("Select query failed...!".'<br>'.mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);

    /*  Send Email   */

    $date = date('Y-m-d H:i:s');

    require_once '../PHPMailer-5.2-stable/PHPMailerAutoload.php';
    $mail= new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth=true;
    $mail->SMTPSecure= 'ssl';
    $mail->Host= 'smtp.gmail.com';
    $mail->Port= '465';
    $mail->Username= 'traveloproject165@gmail.com';
    $mail->Password = 'travelo123';
    $mail->SetFrom('no@gmail.com');
    $mail->Subject='Travelo';
    $mail->Body="You have Canceled Flight Number $_GET[flightNumber] From $row[source] To $row[destination] Successfully.\r\nCancelation Date: $date";
    $mail->ADDAddress($_SESSION[email]);
    $mail->Send();

    $msg = "canceled";
}

header("Location: ../cartFlight.php?flightNumber=$_GET[flightNumber]&msg=$msg");

?>