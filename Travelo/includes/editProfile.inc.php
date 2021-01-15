<?php

include_once'dbh.inc.php';
session_start();

if(isset($_POST['submit']))
{
    if(!empty($_POST['oldPassword']))
    {
        if($_POST['oldPassword'] == $_SESSION['password'])
        {
            if($_POST['password'] == $_POST['confirmPassword'])
            {
                if( ($_GET['username'] != $_POST['username']) || ($_GET['email'] != $_POST['email']))
                {
                    if($_GET['username'] != $_POST['username'])
                        $query = "SELECT * FROM user WHERE username = '$_POST[username]'";
                    else
                        $query = "SELECT * FROM user WHERE email = '$_POST[email]'";
                    $result = mysqli_query($conn, $query)
                        or die("Select query failed...!".'<br>'.mysqli_error($conn));
                    $row = mysqli_fetch_assoc($result);
                    if(mysqli_affected_rows($conn)>0)
                    {
                        if($row['username'] == $_POST['username'])
                            header("Location: ../editProfile.php?editMsg=username");
                        elseif($row['email'] == $_POST['email'])
                            header("Location: ../editProfile.php?editMsg=email");
                        exit();
                    }
                }
                $query = "UPDATE `user` SET `username` = '$_POST[username]', `email` = '$_POST[email]', `password` = '$_POST[password]' WHERE `user`.`username` = '$_GET[username]';";
                $result = mysqli_query($conn, $query)
                    or die("Update query failed...!".'<br>'.mysqli_error($conn));
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                header("Location: ../editProfile.php?editMsg=updated");
            }
            else
                header("Location: ../editProfile.php?editMsg=passwordMatch");
            exit();
        }
        else
        {
            header("Location: ../editProfile.php?editMsg=passwordIncorrect");
            exit();
        }
    }
    else
    {
        header("Location: ../editProfile.php");
        exit();
    }
}

$query = "SELECT * FROM user WHERE username = '$_SESSION[username]'";
$result = mysqli_query($conn, $query)
    or die("Select query failed...!".'<br>'.mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

foreach ($row as $field => $value)
    $_SESSION[$field] = $value;

header("Location: ../editProfile.php");

?>