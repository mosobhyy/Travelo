<?php
$username = "";
$password = "";
if(isset($_GET['loginError']))
{
    if($_GET['loginError'] == "notfound")
    {

        echo "<script>
                document.onreadystatechange = function()
                {
                    if(document.readyState=='loaded' || document.readyState=='complete')
                        alert('Invalid username or password...!');
                }
             </script>";
    }
}

elseif(isset($_GET['logout']))
{
    session_start();
    session_unset();
    session_destroy();
}

if(isset($_COOKIE['username']))
{
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="LoginRegister.css">
    </head>

    <body>
        <form action="includes/login.inc.php" method="POST">
            <div class="login-box">
                <h1>Login</h1>
                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username" value="<?php echo "$username" ?>" required>
                </div>


                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" value="<?php echo "$password" ?>" required>
                </div>


                <div>
                    <input type="checkbox" id="checkbox" name="remember">
                    <label>Remember Me</label>
                </div>

                <input type="submit" class="btn" value="Sign in" name="login">

                <p>Don't have an account ? <a href="Register.php">Sign Up</a></p>
                <a href="forget.php">Forget Password?</a>

            </div>
        </form>
    </body>

</html>