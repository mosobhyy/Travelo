<?php
include "navigation.php";

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Aircraft</title>
        <link rel="stylesheet" href="FlightAircraft.css">
    </head>

    <body>

        <!-- Content  -->

        <?php

        if(isset($_GET['updateAircraftmsg']))
        {
            if($_GET['updateAircraftmsg'] == "failed")
                $msg = "This Aircraft number already exist...!";
            elseif($_GET['updateAircraftmsg'] == "success")
                $msg = "Aircraft updated successfully...";

            echo "<script>
                document.onreadystatechange = function()
                {
                    if(document.readyState=='loaded' || document.readyState=='complete')
                        alert('$msg');
                }
         </script>";
        }

        $aircraftNumber = $_SESSION['aircraftNumber'];

        echo "<form class='aircraft' action='includes/updateAircraft.inc.php?aircraftNumber=$aircraftNumber' method='POST'>
            <fieldset>
            <legend>
            <h3>Aircraft information</h3>
            </legend>
            <input type='text' placeholder='Aircraft Number' name='number' required
            value='$_SESSION[aircraftNumber]'>
            <input type='text' placeholder='Aircraft Name' name='name' required
            value='$_SESSION[name]'>
            <input type='text' placeholder='Aircraft Airline' name='airline' required
            value='$_SESSION[airline]'>
            <input type='text' placeholder='Responsible-Office' name='office' required
            value='$_SESSION[office]'>
            <input type='text' placeholder='Contact' name='contact' required
            value='$_SESSION[contact]'>
            <input type='number' placeholder='Capacity' name='capacity' required
            value='$_SESSION[capacity]'>
            <input type='submit' class='btn' value='Submit' name='update'>
            </fieldset>
            </form>";

        ?>

    </body>

</html>
