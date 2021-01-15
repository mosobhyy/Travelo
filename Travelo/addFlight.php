<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Flight</title>
        <link rel="stylesheet" href="FlightAircraft.css">
    </head>

    <body>

        <?php

        if(isset($_GET['addFlightmsg']))
        {
            if($_GET['addFlightmsg'] == "failed")
                $msg = "This Flight number already exist...!";
            elseif($_GET['addFlightmsg'] == "success")
                $msg = "Flight added successfully...";

            echo "<script>
                document.onreadystatechange = function()
                {
                    if(document.readyState=='loaded' || document.readyState=='complete')
                        alert('$msg');
                }
         </script>";
        }

        ?>

        <!-- Content  -->


        <form class="flight" action="includes/addFlight.inc.php" method="post">
            <fieldset>
                <legend>
                    <h3>Flight information</h3>
                </legend>
                <input type="text" placeholder="Flight Number" name="number" required>
                <input type="text" placeholder="Airline" name="airline" required>
                <input type="text" placeholder="Source" name="source" required>
                <input type="text" placeholder="Destintaion" name="destination" required>
                <input placeholder="Date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" 
                       name="date" required/>
                <input type="number" placeholder="Capacity" name="capacity" required>
                <input type="number" placeholder="Baggage Allowance" name="baggage" required>
                <textarea placeholder="Description" rows="5" name="description" required></textarea>
                <input type="number" placeholder="Fare" name="fare" required>
                <input type="submit" class="btn" value="Submit">
            </fieldset>
        </form>

    </body>

</html>