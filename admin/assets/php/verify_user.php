<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['user_id']) || !ctype_digit($_POST['user_id'])) {
        $message = "Invalid request!";
        $type = "error";
        header("Location: ../../unverified_users.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
    }

    $user_id = intval($_POST['user_id']);
    $new_status = intval($_POST['new_status']);

    $stmt = $conn->prepare("UPDATE users SET verified = 1 WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        $message = "User verified successfully!";
        $type = "success";
    } else {
        $message = "Error updating verifying user!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../unverified_users.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
