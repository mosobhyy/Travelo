<?php
include "navigation.php";
include_once"includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Book</title>
        <link rel="stylesheet" href="FlightAircraft.css">
    </head>
    <script>
        function cancel() 
        {
            return confirm("Are You Sure you want to Cancel This Flight !");
        }
    </script>

    <body>

        <!-- Content  -->

        <?php
        if(isset($_GET['flightNumber']) || isset($_GET['msg']))
        {
            if(isset($_GET['msg']))
            {
                if($_GET['msg']=="updated")
                {
                    echo "<script>
                            document.onreadystatechange = function()
                            {
                                if(document.readyState=='loaded' || document.readyState=='complete')
                                    alert('Flight booking information updated Successfully...');
                            }
                         </script>";
                }
                else
                {
                    echo "<script>
                            document.onreadystatechange = function()
                            {
                                if(document.readyState=='loaded' || document.readyState=='complete')
                                {
                                    alert('Flight Booked Successfully, verification email has been sent...');
                                    window.location.href = 'cart.php';
                                }
                            }
                         </script>";
                    exit();
                }
            }
            $flightQuery = "SELECT * FROM flight WHERE flightNumber = '$_GET[flightNumber]'";
            $flightResult = mysqli_query($conn, $flightQuery)
                or die("Select query failed...!".'<br>'.mysqli_error($conn));
            $flightRow = mysqli_fetch_assoc($flightResult);
            $cartQuery = "SELECT cart.seatClass, cart.seatNumber FROM cart WHERE flightNumber = '$_GET[flightNumber]'";
            $cartResult = mysqli_query($conn, $cartQuery)
                or die("Select query failed...!".'<br>'.mysqli_error($conn));
            $cartRow = mysqli_fetch_assoc($cartResult);
            echo "<form id='flight' action='includes/updateBook.inc.php?flightNumber=$flightRow[flightNumber]' method='post'>
            <fieldset>
            <legend>
            <h3>Flight information</h3>
            </legend>
            <input type='text' placeholder='Flight Number' value='$flightRow[flightNumber]' readonly>
            <input type='text' placeholder='Airline' value='$flightRow[airline]' readonly>
            <input type='text' placeholder='Source' value='$flightRow[source]' readonly>
            <input type='text' placeholder='Destintaion' value='$flightRow[destination]' readonly>
            <input type='date' value='$flightRow[date]' readonly>
            <input type='number' placeholder='Capacity' value='$flightRow[capacity]' readonly>
            <textarea placeholder='Description' rows='5' readonly>$flightRow[description]</textarea>
            <select class='select-css' name='seatClass' required>
                    <option selected hidden>$cartRow[seatClass]</option>
                    <option>Economy</option>
                    <option>Premium Economy</option>
                    <option>First Class</option>
                    <option>Business Class</option>
                </select>
                <input type='number' placeholder='Seat Number' value='$cartRow[seatNumber]' name='seatNumber' required>
            <input type='number' placeholder='Fare' value='$flightRow[fare]' readonly>
            <input type='submit' class='submit-btn' value='Submit Changes' name='update'>
                <input type='submit' class='cancel-btn' value='Cancel Booking' onclick='return cancel();'>
            </fieldset>
                </form>";
        }
        ?>

    </body>

</html>