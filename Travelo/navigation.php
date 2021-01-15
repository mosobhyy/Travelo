<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Travelo</title>
        <link rel="stylesheet" href="navigation.css">
    </head>

    <body>

        <div class="navigation">
            <label style="float: left"><h1>Travelo</h1></label>
            <ul>
                <?php
                session_start();
                if(isset($_SESSION['role']))
                {
                    echo "<li><i class='fas fa-home'></i><a href='index.php'>Home</a></li>";
                    if($_SESSION['role'] == "admin")
                    {
                        echo "<li><i class='fas fa-plus-circle'></i><a href='#Add'>Add</a>
                            <div class='sub-menu'>
                            <ul>
                            <li><a href='addAircraft.php'>Aircraft</a></li>
                            <li><a href='addFlight.php'>Flight</a></li>
                            </ul>
                            </div>
                            </li>";

                        echo "<li><i class='fas fa-edit'></i><a href='#Update'>Update</a>
                            <div class='sub-menu'>
                            <ul>
                            <li><a href='selectAircraft.php'>Aircraft</a></li>
                            <li><a href='selectFlight.php'>Flight</a></li>
                            </ul>
                            </div>
                            </li>";
                    }
                    else
                        echo "<li><i class='fas fa-cart-plus'></i><a href='Cart.php'>Cart</a></li>";
                    echo "<li><i class='fas fa-user'></i><a href='#Profile'>$_SESSION[username]</a>
                        <div class='sub-menu'>
                        <ul>
                        <li><a href='includes/editProfile.inc.php'>Edit Profile</a></li>
                        <li><a href='login.php?logout'>Log out</a></li>
                        </ul>
                        </div>
                        </li>";
                }
                else
                    echo "<li><i class='fas fa-sign-in-alt'></i><a href='login.php'>Sign in</a></li>";
                ?>
            </ul>
        </div>

    </body>

</html>