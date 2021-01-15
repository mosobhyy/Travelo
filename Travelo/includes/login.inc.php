<?php
include_once'dbh.inc.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM `user` WHERE username = '$username' AND PASSWORD = '$password'";
$result = mysqli_query($conn, $query)
    or die("Select query failed...!".'<br>'.mysqli_error($conn));;
$row = mysqli_fetch_assoc($result);

if(empty($row))
    header("Location: ../Login.php?loginError=notfound");
else
{
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $row['email'];
    $_SESSION['role'] = $row['role'];
    /* Cookies for remember user mail and password */
    if(isset($_POST['remember']))
    {
        /* Set Cookie for 1 month */
        setcookie("username", "$_POST[username]", time() + (86400 * 30), "/");
        setcookie("email", "$_POST[email]", time() + (86400 * 30), "/");
        setcookie("password", "$_POST[password]", time() + (86400 * 30), "/");
    }
    header("Location: ../index.php");
}

?>