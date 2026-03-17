<?php
require 'config/connection.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['miner_id'])) {
    $miner_id = intval($_POST['miner_id']);

    $stmt = $conn->prepare("DELETE FROM miners WHERE id = ?");
    $stmt->bind_param("i", $miner_id);

    if ($stmt->execute()) {
        $message = "Miner deleted successfully!";
        $type = "success";
    } else {
        $message = "Error deleting miner!";
        $type = "danger";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../miners.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
