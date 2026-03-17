<?php
require 'config/connection.php';
require 'send_email.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['email'];
    $subject = $_POST['email_subject'];
    $message = $_POST['email_message'];
    $user_id = $_POST['user_id'];

    if (sendNotificationEmail($to, $message, $subject)) {
        $message = "Email sent successfully!";
        $type = "success";
    } else {
        $message = "Failed to send email!";
        $type = "error";
    }

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
}
