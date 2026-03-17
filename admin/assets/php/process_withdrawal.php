<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    if (
        !isset($_POST['transaction_id']) || !ctype_digit($_POST['transaction_id']) ||
        !isset($_POST['user_id']) || !ctype_digit($_POST['user_id']) ||
        !isset($_POST['amount']) || !is_numeric($_POST['amount']) ||
        // !isset($_POST['notification_id']) || !ctype_digit($_POST['notification_id'])
        !isset($_POST['username'])
    ) {
        $message = "Invalid or missing required fields!";
        $type = "error";
        header("Location: ../../withdraw.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
    }

    // Assign variables
    $transaction_id = intval($_POST['transaction_id']);
    $user_id = intval($_POST['user_id']);
    $amount = floatval($_POST['amount']);
    // $notification_id = intval($_POST['notification_id']);
    $username = $_POST['username'];
    $action = $_POST['action'];

    // Validate action type
    if (!in_array($action, ['approve', 'decline'])) {
        $message = "Invalid action!";
        $type = "error";
        header("Location: ../../withdraw.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
    }

    // Start MySQL transaction
    $conn->begin_transaction();

    try {
        // ✅ Fetch User Balance
        $checkBalance = $conn->prepare("SELECT balance FROM users WHERE id = ?");
        $checkBalance->bind_param("i", $user_id);
        $checkBalance->execute();
        $checkBalance->bind_result($current_balance);
        $checkBalance->fetch();
        $checkBalance->close();

        if ($action === 'approve') {
            if ($current_balance < $amount) {
                // ❌ Automatically decline if balance is insufficient
                $status = 'declined';
                $message = "Withdrawal declined due to insufficient balance!";
            } else {
                // ✅ Approve the withdrawal
                $status = 'approved';

                // Deduct from User Balance
                $updateBalance = $conn->prepare("UPDATE users SET balance = balance - ? WHERE id = ?");
                $updateBalance->bind_param("di", $amount, $user_id);
                if (!$updateBalance->execute()) {
                    throw new Exception("Error updating user balance!");
                }
                $updateBalance->close();

                $message = "Withdrawal approved successfully!";
            }
        } else {
            $status = 'declined';
            $message = "Withdrawal declined successfully!";
        }

        // ✅ Update Withdrawal Transaction Status
        $updateTransaction = $conn->prepare("UPDATE transactions SET status = ? WHERE id = ?");
        $updateTransaction->bind_param("si", $status, $transaction_id);
        if (!$updateTransaction->execute()) {
            throw new Exception("Error updating withdrawal status!");
        }
        $updateTransaction->close();

        // // ✅ Mark Notification as Read
        // $markNotification = $conn->prepare("UPDATE notifications SET status = 'read' WHERE id = ?");
        // $markNotification->bind_param("i", $notification_id);
        // if (!$markNotification->execute()) {
        //     throw new Exception("Error marking notification as read!");
        // }
        // $markNotification->close();

        // ✅ Insert New Notification
        $notification_message = "Your withdrawal request of $$amount has been " . ucfirst($status);
        $insertNotification = $conn->prepare("INSERT INTO notifications (user_id, user_name, message, recipient_type, status) VALUES (?, ?, ?, 'user', 'unread')");
        $insertNotification->bind_param("iss", $user_id, $username, $notification_message);
        if (!$insertNotification->execute()) {
            throw new Exception("Error inserting notification!");
        }
        $insertNotification->close();

        // Commit the transaction if all queries succeed
        $conn->commit();
        $type = "success";
    } catch (Exception $e) {
        // Rollback transaction if any query fails
        $conn->rollback();
        $message = $e->getMessage();
        $type = "error";
    }

    $conn->close();
    header("Location: ../../withdraw.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
