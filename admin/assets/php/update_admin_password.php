<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $newPassword = $_POST['newPassword'];

    // Hash new password
    // $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update password in database
    $stmt = $conn->prepare("UPDATE admin SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $newPassword, $user_id);

    if ($stmt->execute()) {
        $message = "Password updated successfully!";
        $type = "success";
    } else {
        $message = "Error updating password!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../dashboard.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
