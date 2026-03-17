<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    if (
        !isset($_POST['transaction_id']) || !ctype_digit($_POST['transaction_id']) ||
        !isset($_POST['user_id']) || !ctype_digit($_POST['user_id']) ||
        !isset($_POST['amount']) || !is_numeric($_POST['amount']) ||
        !isset($_POST['username'])
    ) {
        $message = "Invalid or missing required fields!";
        $type = "error";
        header("Location: ../../transactions.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
    }

    // Assign variables
    $transaction_id = intval($_POST['transaction_id']);
    $user_id = intval($_POST['user_id']);
    $amount = floatval($_POST['amount']);
    $username = $_POST['username'];
    $action = $_POST['action'];

    // Validate action type
    if (!in_array($action, ['approve', 'decline'])) {
        $message = "Invalid action!";
        $type = "error";
        header("Location: ../../transactions.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
    }

    // Start MySQL transaction to ensure atomicity
    $conn->begin_transaction();

    try {
        $status = ($action === 'approve') ? 'approved' : 'declined';

        // ✅ Update Transaction Status
        $updateTransaction = $conn->prepare("UPDATE transactions SET status = ? WHERE id = ?");
        $updateTransaction->bind_param("si", $status, $transaction_id);
        if (!$updateTransaction->execute()) {
            throw new Exception("Error updating transaction!");
        }
        $updateTransaction->close();

        // ✅ Insert New Notification
        $notification_message = "Your transaction of $$amount has been " . ucfirst($status);
        $insertNotification = $conn->prepare("INSERT INTO notifications (user_id, user_name, message, recipient_type, status) VALUES (?, ?, ?, 'user', 'unread')");
        $insertNotification->bind_param("iss", $user_id, $username, $notification_message);
        if (!$insertNotification->execute()) {
            throw new Exception("Error inserting notification!");
        }
        $insertNotification->close();

        // Commit the transaction if all queries succeed
        $conn->commit();
        $message = "Transaction " . ucfirst($status) . " Successfully!";
        $type = "success";
    } catch (Exception $e) {
        // Rollback transaction if any query fails
        $conn->rollback();
        $message = $e->getMessage();
        $type = "error";
    }

    $conn->close();
    header("Location: ../../transactions.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
