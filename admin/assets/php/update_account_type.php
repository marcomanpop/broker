<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $new_account_type = $_POST['new_account'];

    // Validate range (0 - 100)

    $stmt = $conn->prepare("UPDATE users SET account_type = ? WHERE id = ?");
    $stmt->bind_param("si", $new_account_type, $user_id);

    if ($stmt->execute()) {
        $message = "Account Updated!";
        $type = "success";
    } else {
        $message = "Error Updating Account!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
