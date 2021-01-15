<?php
include_once'dbh.inc.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$role = $_POST['role'];

if(!$role)
    header("Location: ../Register.php?registerError=role");
else if($password!==$confirmPassword)
    header("Location: ../Register.php?registerError=password");
else
{
    $query = "SELECT `username`, `email` FROM `user` WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $query)
        or die("Select query failed...!".'<br>'.mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    if($row['username'] == $username)
        header("Location: ../Register.php?registerError=username");
    else if($row['email'] == $email)
        header("Location: ../Register.php?registerError=email");
    else
    {
        $query = "INSERT INTO `user` VALUES('$username', '$email', '$password', '$role')";
        $result = mysqli_query($conn, $query)
            or die("Insert query failed...!".'<br>'.mysqli_error($conn));
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        header("Location: ../index.php");
    }
}
?>