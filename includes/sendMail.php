<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';
function sendMailPhpmailer($id,$activeCode,$email,$lastName){
$templateMail="<h3>Account verification</h3></div><div>Your ID : ".$email."</div><a href='http://localhost/salePage/modules/register.php?id=".$id."&activeCode=".$activeCode."'>click here for activate your account</a>";
$password = "TmpGaGJXRnJhR1U9";
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'lethe61amakhe@gmail.com';                     // SMTP username
    $mail->Password   = $password;                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo($email, 'Active');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "[LeHue] Account verification";
    $mail->Body    = $templateMail;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    return true;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    return false;
}
}
?>