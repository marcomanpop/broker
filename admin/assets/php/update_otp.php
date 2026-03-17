<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $newOTP = $_POST['newOTP'];

    // Update password in database
    $stmt = $conn->prepare("UPDATE users SET otp = ? WHERE id = ?");
    $stmt->bind_param("ii", $newOTP, $user_id);

    if ($stmt->execute()) {
        $message = "OTP updated successfully!";
        $type = "success";
    } else {
        $message = "Error updating OTP!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
