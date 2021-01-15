<?php
include "navigation.php";
include_once"includes/dbh.inc.php";

$query = "SELECT `flightNumber` FROM `flight`";
$result = mysqli_query($conn, $query)
    or die("Select query failed...!".'<br>'.mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Flight</title>
        <link rel="stylesheet" href="FlightAircraft.css">
    </head>

    <body>

        <!-- Content  -->

        <?php if(mysqli_affected_rows($conn)>0)
{

    echo "<form class='flight' action='includes/updateFlight.inc.php' method='post'>".
        "<fieldset>".
        "<legend>".
        "<h3>Flight information</h3>".
        "</legend>";
    echo "<select class='select-css' name='select'>".
        "<option selected hidden>Flight Number</option>";
    while ($row = mysqli_fetch_assoc($result))
        foreach ($row as $field => $value)
            echo '<option>'.$value.'</option>';
    "</select>";
    echo "<input type='submit' class='btn' value='Submit'>".
        "</fieldset>".
        "</form>";
}
        else
        {
            echo '<P class="message">There is no Flights to update...!</p>';
        }
        ?>
    </body>

</html>