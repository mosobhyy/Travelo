<?php
include_once"dbh.inc.php";
session_start();
if($_POST['book'])
{
    $bookMsg="";
    $query = "SELECT * FROM `cart` WHERE username = '$_SESSION[username]' AND flightNumber = '$_GET[flightNumber]'";
    $result = mysqli_query($conn, $query)
        or die("Select query failed...!".'<br>'.mysqli_error($conn));
    if(mysqli_affected_rows($conn) == 0)
    {

        /* Add Flight to Customer Cart */

        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO cart (username, flightNumber,seatClass, seatNumber, paymentCard, cardNumber, cardPassword, bookDate) VALUES ('$_SESSION[username]', '$_GET[flightNumber]', '$_POST[seatClass]', '$_POST[seatNumber]','$_POST[paymentCard]', '$_POST[cardNumber]', '$_POST[cardPassword]', '$date')";
        $result = mysqli_query($conn, $query)
            or die("Insert query failed...!".'<br>'.mysqli_error($conn));

        /* Plus One to Reserved Column in Flight Table */

        $query = "UPDATE flight SET reserved = reserved+1 WHERE flight.flightNumber = '$_GET[flightNumber]'";
        $result = mysqli_query($conn, $query)
            or die("Update query failed...!".'<br>'.mysqli_error($conn));

        /*  Get Flight Informaion to sent in email    */

        $query = "SELECT * FROM `flight` WHERE flight.flightNumber = '$_GET[flightNumber]'";
        $result = mysqli_query($conn, $query)
            or die("Select query failed...!".'<br>'.mysqli_error($conn));
        $row = mysqli_fetch_assoc($result);

        /*  Send Email   */
        
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
        $mail->Body="Hey $_SESSION[username] !\r\nYou have Booked Flight Number $_GET[flightNumber] From $row[source] To $row[destination] Successfully.\r\nFlight Details: $row[description]\r\nFlight Airline: $row[airline]\r\nFlight Date: $row[date]\r\nSeat Class: $_POST[seatClass]\r\nSeat Number: $_POST[seatNumber]\r\nPayment Method: $_POST[paymentCard] - Card Number: $_POST[cardNumber]\r\nBooking Time: $date";
        $mail->ADDAddress($_SESSION[email]);
        $mail->Send();
        
        $bookMsg = "success";
    }
    else
        $bookMsg = "failed";
    header("Location: ../book.php?bookMsg=$bookMsg&flightNumber=$_GET[flightNumber]");
}
?>