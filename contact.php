<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["submit"]))
{

    /* Exception class. */
    require './PHPMailer/src/Exception.php';

    /* The main PHPMailer class. */
    require './PHPMailer/src/PHPMailer.php';

    /* SMTP class, needed if you want to use SMTP. */
    require './PHPMailer/src/SMTP.php';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet="UTF-8";
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = 'Enter email here';
    $mail->Password = 'Enter password here';
    $mail->SMTPAuth = true;
    
    $mail->From = $_POST['email'];
    $mail->FromName = $_POST['name'];
    $mail->AddAddress('Enter email here');
    $mail->AddReplyTo($_POST['Enter email here'], 'Information');
    
    $mail->IsHTML(true);
    $mail->Subject    = $_POST["subject"];
    $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
    $mail->Body    = $_POST["message"]."reach back to him @ ".$_POST["email"];
    
    if(!$mail->Send())
    {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
      echo "Message sent!";
    }
}
?>