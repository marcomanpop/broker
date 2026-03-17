<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'config/mailer/vendor/autoload.php';
require 'config/PHPMailer-master/src/Exception.php';
require 'config/PHPMailer-master/src/PHPMailer.php';
require 'config/PHPMailer-master/src/SMTP.php';

function sendNotificationEmail($to_email, $message, $message_title)
{
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.urunwa.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@urunwa.com';
        $mail->Password = 'admin@urunwa.com';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('admin@urunwa.com', 'URUNWA');
        $mail->addAddress($to_email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $message_title;
        $mail->Body = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
