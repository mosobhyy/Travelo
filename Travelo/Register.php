<?php
if(isset($_GET['registerError']))
{
    if($_GET['registerError'] == "role")
        $error =  "Choice your role...!";
    else if($_GET['registerError'] == "password")
        $error =  "Password does not match...!";
    else if($_GET['registerError'] == "username")
        $error =  "This username alreay exist...!";
    else if($_GET['registerError'] == "email")
        $error =  "This email alreay exist...!";
    echo "<script>
                document.onreadystatechange = function()
                {
                    if(document.readyState=='loaded' || document.readyState=='complete')
                        alert('$error');
                }
         </script>";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="LoginRegister.css">
    </head>

    <body>
        <form action="includes/register.inc.php" method="POST">
            <div class="login-box">
                <h1>Register</h1>
                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username" required>
                </div>

                <div class="textbox">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" required>
                </div>

                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" required>
                </div>

                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Confirm Password" name="confirmPassword" required>
                </div>

                <div class="Role">
                    <h4>Register as: </h4>
                    <input type="radio" name="role" value="admin" required> Admin
                    <input type="radio" name="role" value="customer" required> Customer
                </div>

                <input type="submit" class="btn" value="Register">

                <p>Already have an account ? <a href="Login.php">Sign in</a></p>

            </div>
        </form>
    </body>

</html>