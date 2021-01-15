<?php
include "navigation.php";

if(isset($_GET['addAircraftmsg']))
{
    if($_GET['addAircraftmsg'] == "failed")
        $msg = "This Aircraft number already exist...!";
    elseif($_GET['addAircraftmsg'] == "success")
        $msg = "Aircraft added successfully...";

    echo "<script>
                document.onreadystatechange = function()
                {
                    if(document.readyState=='loaded' || document.readyState=='complete')
                        alert('$msg');
                }
         </script>";
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Aircraft</title>
        <link rel="stylesheet" href="FlightAircraft.css">
    </head>

    <body>

        <?php

        if(isset($_GET['addAircraftmsg']))
        {
            if($_GET['addAircraftmsg'] == "failed")
                $msg = "This Aircraft number already exist...!";
            elseif($_GET['addAircraftmsg'] == "success")
                $msg = "Aircraft added successfully...";

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

        <form class="aircraft" action="includes/addAircraft.inc.php" method="post">
            <fieldset>
                <legend>
                    <h3>Aircraft information</h3>
                </legend>
                <input type="text" placeholder="Aircraft Number" name="number" required>
                <input type="text" placeholder="Aircraft Name" name="name" required>
                <input type="text" placeholder="Aircraft Airline" name="airline" required>
                <input type="text" placeholder="Responsible-Office" name="office" required>
                <input type="text" placeholder="Contact" name="contact" required>
                <input type="text" placeholder="Capacity" name="capacity" required>
                <input type="submit" class="btn" value="Submit">
            </fieldset>
        </form>

    </body>

</html>