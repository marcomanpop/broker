<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $message = $_POST['notification_message'];

    $stmt = $conn->prepare("INSERT INTO notifications (user_id, user_name, message, recipient_type, created_at) VALUES (?, ?, ?, 'user', NOW())");
    $stmt->bind_param("iss", $user_id, $username, $message);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    $message = "Notification sent!!";
    $type = "success";

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
}
