<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $new_trade_progress = intval($_POST['new_trade_progress']);

    // Validate range (0 - 100)
    if ($new_trade_progress < 0 || $new_trade_progress > 100) {
        $message = "Trade Progress must be between 0 and 100!";
        $type = "error";
        header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
    }

    $stmt = $conn->prepare("UPDATE users SET trade_progress = ? WHERE id = ?");
    $stmt->bind_param("si", $new_trade_progress, $user_id);

    if ($stmt->execute()) {
        $message = "Trade Progress Updated!";
        $type = "success";
    } else {
        $message = "Error Updating Trade Progress!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
