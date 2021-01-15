<?php
include "navigation.php";
include_once"includes/dbh.inc.php";

$query = "SELECT `aircraftNumber` FROM `aircraft`";
$result = mysqli_query($conn, $query)
    or die("Select query failed...!".'<br>'.mysqli_error($conn));
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

        <?php if(mysqli_affected_rows($conn)>0)
{

    echo "<form class='aircraft' action='includes/updateAircraft.inc.php' method='post'>".
        "<fieldset>".
        "<legend>".
        "<h3>Aircraft information</h3>".
        "</legend>";
        echo "<select class='select-css' name='select'>".
        "<option selected hidden>Aircraft Number</option>";
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
            echo '<P class="message">There is no Aircrafts to update...!</p>';
        }
        ?>
    </body>

</html>