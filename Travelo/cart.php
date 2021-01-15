<?php
include "navigation.php";
include_once"includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="Travelo" content="Travelo">
        <title>Travelo</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <style>
        h2
        {
            font-size: 50px;
            margin-top: 10%;
            font-weight: bold;
            color: black;
        }
    </style>

    <body>


        <!-- Cards  -->

        <?php
        $cartQuery = "SELECT flightNumber FROM cart WHERE username = '$_SESSION[username]'";
        $cartResult = mysqli_query($conn, $cartQuery)
            or die("Select query failed...!".'<br>'.mysqli_error($conn));

        if(mysqli_affected_rows($conn)>0)
        {
            while ($cartRow = mysqli_fetch_assoc($cartResult))
            {
                $flightQuery = "SELECT * FROM flight WHERE flightNumber = '$cartRow[flightNumber]'";
                $flightResult = mysqli_query($conn, $flightQuery)
                    or die("Select query failed...!".'<br>'.mysqli_error($conn));
                $flightRow = mysqli_fetch_assoc($flightResult);
                $ma ="$flightRow[capacity]-$flightRow[reserved]";
                $empty = eval('return '.$ma.';');

                echo "<form action='cartFlight.php' method='get' style='display:inline!important;'>";

                if($_SESSION['role'] == "admin")
                    echo "<button class='button' type='submit' name='flightNumber' value='$flightRow[flightNumber]' disabled>";
                else
                    echo "<button class='button' type='submit' name='flightNumber' value='$flightRow[flightNumber]'>";

                echo "<div class='card'>
                <div class='card-image'></div>
                <div class='card-text'>
                <span class='date'>$flightRow[date]</span>
                <h2>$flightRow[destination]</h2>
                <p>$flightRow[description]</p>
                </div>
                <div class='card-stats'>
                <div class='stat'>
                <div class='value'>$flightRow[capacity]</div>
                <div class='type'>Capacity</div>
                </div>
                <div class='stat border'>
                <div class='value'>$flightRow[reserved]</div>
                <div class='type'>Reserved</div>
                </div>
                <div class='stat'>
                <div class='value'>$empty</div>
                <div class='type'>Empty</div>
                </div>
                </div>
                </div>

                </button>
            </form>";
            }
        }
        else
            echo "<h2>No Flights Booked In Your Cart...!</h2>";

        ?>


    </body>
</html>