<?php
if(isset($_GET['user']))
{
    if($_GET['user'] == "notfound")
    {
        echo "<script>
                document.onreadystatechange = function()
                {
                    if(document.readyState=='loaded' || document.readyState=='complete')
                        alert('This Email Not Registered...!');
                }
             </script>";
    }
    elseif($_GET['user'] == "found")
    {
        echo "<script>
                document.onreadystatechange = function()
                {
                    if(document.readyState=='loaded' || document.readyState=='complete')
                        alert('Password Has Been Sent To Your Email...');
                }
             </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="LoginRegister.css">
    </head>

    <style>
        .login-box h1
        {
            font-size: 30px;
        }
    </style>

    <body>
        <form action="includes/forget.inc.php" method="POST">
            <div class="login-box">
                <h1>Forget Password</h1>

                <div class="textbox">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" required>
                </div>

                <a>
                    <input type="submit" class="btn" value="Send">
                </a>

                <p>Already have an account ? <a href="Login.php">Sign in</a></p>
                <p>Don't have an account ? <a href="Register.html">Sign Up</a></p>

            </div>
        </form>
    </body>

</html>