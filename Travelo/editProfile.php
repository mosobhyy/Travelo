<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Edit Profile</title>
        <link rel="stylesheet" href="LoginRegister.css">
    </head>
    
    <script>
        function change()
        {
            var password = prompt("Enter password to submit changes");
            document.getElementById("confirm").value = password;
        }
    </script>

    <body>
        <?php

        if(isset($_GET['editMsg']))
        {
            $msg='';
            if($_GET['editMsg'] == "username")
                $msg = 'This username alreay exist...!';
            elseif($_GET['editMsg'] == "email")
                $msg = 'This email alreay exist...!';
            else if($_GET['editMsg'] == "passwordMatch")
                $msg = 'New Password does not match...!';
            else if($_GET['editMsg'] == "passwordIncorrect")
                $msg = 'Incorrect password...!';
            else if($_GET['editMsg'] == "updated")
                $msg = 'Your information updated successfully...';

            echo "<script type='text/javascript'>
                window.onload = function()
                {
                    alert('$msg');
                }
             </script>";
        }

        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        echo "<form action='includes/editProfile.inc.php?username=$username&email=$email' method='POST'>
                <div class='login-box'>
                <h1>Edit Profile</h1>
                <div class='textbox'>
                <i class='fas fa-user'></i>
                <input type='text' placeholder='Username' name='username' value='$_SESSION[username]' required>
                </div>

                <div class='textbox'>
                <i class='fas fa-envelope'></i>
                <input type='email' placeholder='Email' name='email' value='$_SESSION[email]' required>
                </div>

                <div class='textbox'>
                <i class='fas fa-lock'></i>
                <input type='password' placeholder='New Password' name='password' value='$_SESSION[password]' required>
                </div>

                <div class='textbox'>
                <i class='fas fa-lock'></i>
                <input type='password' placeholder='Confirm New Password' name='confirmPassword' value='$_SESSION[password]' required>
                </div>
                
                <input type='text' id='confirm' name='oldPassword' hidden>

                <input type='submit' class='btn' value='Submit' name='submit' onclick='change()'>

                </div>
                </form>";
        ?>
    </body>

</html>