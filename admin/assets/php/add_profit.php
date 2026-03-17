<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $username = $_POST['user_name'];
    $profit_amount = floatval($_POST['profit_amount']);

    // Update profit_balance
    $sql = "UPDATE users SET profit_balance = profit_balance + ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $profit_amount, $user_id);

    if ($stmt->execute()) {
        // Insert notification
        $message = "You received a profit of $$profit_amount.";
        $notif_sql = "INSERT INTO notifications (user_id, user_name, message, recipient_type, status) VALUES (?, ?, ?, 'user', 'unread')";
        $notif_stmt = $conn->prepare($notif_sql);
        $notif_stmt->bind_param("iss", $user_id, $username, $message);
        $notif_stmt->execute();

        $message = "Profit added successfully!";
        $type = "success";
    } else {
        $message = "Error adding profit!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
