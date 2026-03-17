<?php
include('config/connection.php');

if (isset($_GET['id'])) {
    $notification_id = intval($_GET['id']);

    $query = "DELETE FROM notifications WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $notification_id);
    if ($stmt->execute()) {
        // Redirect back to notifications page or any other page
        $message = "Marked as read!";
        $type = "success";
    } else {
        $message = "Error updating notification status!";
        $type = "error";
    }
    header("Location: ../../notifications.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
} else {

    $message = "Invalid request!";
    $type = "error";

    header("Location: ../../notifications.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
