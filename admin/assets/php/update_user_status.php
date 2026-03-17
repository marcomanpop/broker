<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['user_id']) || !isset($_POST['new_status'])) {
        $message = "Invalid request!";
        $type = "error";
        header("Location: ../../users.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
    }

    $user_id = intval($_POST['user_id']);
    $new_status = intval($_POST['new_status']); // 1 for Blocked, 0 for Unblocked

    $stmt = $conn->prepare("UPDATE users SET blocked = ? WHERE id = ?");
    $stmt->bind_param("ii", $new_status, $user_id);

    if ($stmt->execute()) {
        $message = ($new_status == 1) ? "User has been blocked!" : "User has been unblocked!";
        $type = "success";
    } else {
        $message = "Error updating user status!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . $user_id . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
