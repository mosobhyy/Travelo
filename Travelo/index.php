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
    <body>


        <!-- Cards  -->

        <?php

        $query = "SELECT * FROM flight";
        $result = mysqli_query($conn, $query)
            or die("Select query failed...!".'<br>'.mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($result))
        {
            /* Calculate Number of Empty seats on flight */
            $ma ="$row[capacity]-$row[reserved]";
            $empty = eval('return '.$ma.';');

            echo "<form action='book.php' method='post' style='display:inline!important;'>";

            /* Make card clickable for customer Who has the ability to book a flight */

            if(isset($_SESSION['role']))
                if($_SESSION['role'] == "customer")
                    echo "<button class='button' type='submit' name='flightNumber' value='$row[flightNumber]'>";

            echo "<div class='card'>
                <div class='card-image'></div>
                <div class='card-text'>
                <span class='date'>$row[date]</span>
                <h2>$row[destination]</h2>
                <p>$row[description]</p>
                </div>
                <div class='card-stats'>
                <div class='stat'>
                <div class='value'>$row[capacity]</div>
                <div class='type'>Capacity</div>
                </div>
                <div class='stat border'>
                <div class='value'>$row[reserved]</div>
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

        ?>


    </body>
</html>