<?php
require 'config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $user_id = intval($_POST['user_id']);

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        $message = "User deleted successfully!";
        $type = "success";
    } else {
        $message = "Error deleting user!";
        $type = "danger";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../unverified_users.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
