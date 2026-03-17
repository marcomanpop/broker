<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $new_signal_strength = intval($_POST['new_signal_strength']);

    // Validate range (0 - 100)
    if ($new_signal_strength < 0 || $new_signal_strength > 100) {
        $message = "Signal Strength must be between 0 and 100!";
        $type = "error";
        header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
    }

    $stmt = $conn->prepare("UPDATE users SET signal_strength = ? WHERE id = ?");
    $stmt->bind_param("si", $new_signal_strength, $user_id);

    if ($stmt->execute()) {
        $message = "Signal Strength Updated!";
        $type = "success";
    } else {
        $message = "Error Updating Signal Strength!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
