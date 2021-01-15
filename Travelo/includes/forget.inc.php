<?php
include_once'dbh.inc.php';

$email = $_POST['email'];

$query = "SELECT * FROM `user` WHERE email = '$email'";
$result = mysqli_query($conn, $query)
    or die("Select query failed...!".'<br>'.mysqli_error($conn));;
$row = mysqli_fetch_assoc($result);

if(empty($row))
    header("Location: ../forget.php?user=notfound");
else
{
    /*  Send Email   */
    require_once '../PHPMailer-5.2-stable/PHPMailerAutoload.php';
    $mail= new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth=true;
    $mail->SMTPSecure= 'ssl';
    $mail->Host= 'smtp.gmail.com';
    $mail->Port= '465';
    $mail->Username= 'traveloproject165@gmail.com';
    $mail->Password = 'travelo123';
    $mail->SetFrom('no@gmail.com');
    $mail->Subject='Travelo';
    $mail->Body="Hey $row[username],\r\nYour Password: $row[password]";
    $mail->ADDAddress($email);
    $mail->Send();
    header("Location: ../forget.php?user=found");
}

?>