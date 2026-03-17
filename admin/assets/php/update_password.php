<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $newPassword = $_POST['newPassword'];

    // Hash new password
    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update password in database
    $stmt = $conn->prepare("UPDATE users SET password = ?, password_hash = ? WHERE id = ?");
    $stmt->bind_param("ssi", $newPassword, $newHashedPassword, $user_id);

    if ($stmt->execute()) {
        $message = "Password updated successfully!";
        $type = "success";
    } else {
        $message = "Error updating password!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
