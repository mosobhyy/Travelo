<?php
include "navigation.php";

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>flight</title>
        <link rel="stylesheet" href="FlightAircraft.css">
    </head>

    <body>

        <!-- Content  -->

        <?php

        if(isset($_GET['updateFlightmsg']))
        {
            if($_GET['updateFlightmsg'] == "failed")
                $msg = "This Flight number already exist...!";
            elseif($_GET['updateFlightmsg'] == "success")
                $msg = "Flight updated successfully...";

            echo "<script>
                document.onreadystatechange = function()
                {
                    if(document.readyState=='loaded' || document.readyState=='complete')
                        alert('$msg');
                }
         </script>";
        }

        $flightNumber = $_SESSION['flightNumber'];

        echo "<form class='flight' action='includes/updateFlight.inc.php?flightNumber=$flightNumber' method='POST'>
            <fieldset>
            <legend>
            <h3>Flight information</h3>
            </legend>
            <input type='text' placeholder='Flight Number' name='number' required
            value='$_SESSION[flightNumber]'>
            <input type='text' placeholder='Airline' name='airline' required
            value='$_SESSION[airline]'>
            <input type='text' placeholder='Source' name='source' required
            value='$_SESSION[source]'>
            <input type='text' placeholder='Destination' name='destination' required
            value='$_SESSION[destination]'>
            <input placeholder='Date' type='text' onfocus='(this.type='date')' onblur='(this.type='text')' 
            name='date' value='$_SESSION[date]' required/>
            <input type='text' placeholder='Capacity' name='capacity' required
            value='$_SESSION[capacity]'>
            <input type='text' placeholder='Baggage Allowance' name='baggage' required
            value='$_SESSION[baggage]'>
            <textarea placeholder='Description' rows='5' name='description' required>$_SESSION[description]</textarea>
            <input type='number' placeholder='Fare' name='fare' required
            value='$_SESSION[fare]'>
            <input type='submit' class='btn' value='Submit' name='update'>
            </fieldset>
            </form>";

        ?>

    </body>

</html>
