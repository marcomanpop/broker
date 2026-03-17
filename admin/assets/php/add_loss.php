<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $username = $_POST['user_name'];
    $loss_amount = floatval($_POST['loss_amount']);

    // Ensure loss does not make balance negative
    $sql_check = "SELECT profit_balance FROM users WHERE id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("i", $user_id);
    $stmt_check->execute();
    $stmt_check->bind_result($profit_balance);
    $stmt_check->fetch();
    $stmt_check->close();

    if ($profit_balance >= $loss_amount) {
        // Deduct loss
        $sql = "UPDATE users SET profit_balance = profit_balance - ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("di", $loss_amount, $user_id);

        if ($stmt->execute()) {
            // Insert notification
            $message = "A loss of $$loss_amount has been deducted from your profit balance.";
            $notif_sql = "INSERT INTO notifications (user_id, user_name, message, recipient_type, status) VALUES (?, ?, ?, 'user', 'unread')";
            $notif_stmt = $conn->prepare($notif_sql);
            $notif_stmt->bind_param("iss", $user_id, $username, $message);
            $notif_stmt->execute();

            $message = "Loss deducted successfully!";
            $type = "success";
        } else {
            $message = "Error deducting loss!";
            $type = "error";
        }

        $stmt->close();
    } else {
        $message = "Insufficient profit balance!";
        $type = "error";
    }

    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
