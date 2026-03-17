<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['user_id']) || !ctype_digit($_POST['user_id']) || !isset($_POST['new_status'])) {
        $message = "Invalid request!";
        $type = "error";
        header("Location: ../../users.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
    }

    $user_id = intval($_POST['user_id']);
    $new_status = intval($_POST['new_status']);

    $stmt = $conn->prepare("UPDATE users SET verified = ? WHERE id = ?");
    $stmt->bind_param("ii", $new_status, $user_id);

    if ($stmt->execute()) {
        $message = ($new_status == 1) ? "User verified successfully!" : "User unverified.";
        $type = "success";
    } else {
        $message = "Error updating verification status!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
