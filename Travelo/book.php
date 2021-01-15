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
        function paymentShow()
        {
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "payment.html", true);
            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("flight").innerHTML = this.response;
                }
            };
            xhttp.send();
            window.scrollBy(0, 500);
        }
    </script>

    <body>

        <!-- Content  -->

        <?php
        if(isset($_POST['flightNumber']))
        {
            $query = "SELECT * FROM flight WHERE flightNumber = $_POST[flightNumber]";
            $result = mysqli_query($conn, $query)
                or die("Select query failed...!".'<br>'.mysqli_error($conn));
            $row = mysqli_fetch_assoc($result);
            echo "<form id='flight' action='includes/book.inc.php?flightNumber=$row[flightNumber]' method='post'>
            <fieldset>
            <legend>
            <h3>Flight information</h3>
            </legend>
            <input type='text' placeholder='Flight Number' value='$row[flightNumber]' readonly>
            <input type='text' placeholder='Airline' value='$row[airline]' readonly>
            <input type='text' placeholder='Source' value='$row[source]' readonly>
            <input type='text' placeholder='Destintaion' value='$row[destination]' readonly>
            <input type='date' value='$row[date]' readonly>
            <input type='number' placeholder='Capacity' value='$row[capacity]' readonly>
            <textarea placeholder='Description' rows='5' readonly>$row[description]</textarea>
            <input type='number' placeholder='Fare' value='$row[fare]' readonly>
            <button type='button' class='btn' onclick='paymentShow()'>Book</button>
            </fieldset>
                </form>";
        }
        elseif(isset($_GET['bookMsg']))
        {
            if($_GET['bookMsg'] == "success")
            {
                echo "<script>
                        document.onreadystatechange = function()
                        {
                            if(document.readyState=='loaded' || document.readyState=='complete')
                            {
                                alert('Your Flight Booked Successfully, verification email has been sent...');
                                window.location.href = 'cartFlight.php?flightNumber=$_GET[flightNumber]';
                            }
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
                                alert('Your Already Booked this flight before...!');
                                window.location.href = 'index.php';
                            }
                        }
                     </script>";
            }
        }
        ?>
    </body>

</html>