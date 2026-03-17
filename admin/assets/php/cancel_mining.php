<?php
require 'config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['record_id'], $_POST['action']) && $_POST['action'] === 'cancel') {
    $record_id = intval($_POST['record_id']);

    // Update the status to 'cancelled'
    $updateQuery = "UPDATE mining_history SET status = 'cancelled' WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("i", $record_id);

    if ($stmt->execute()) {
        $message = "Mining process cancelled successfully";
        $type = "success";
    } else {
        $message = "Failed to cancel mining process!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../minings.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
