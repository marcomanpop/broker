<?php
require 'config/connection.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['trader_id'])) {
    $trader_id = intval($_POST['trader_id']);

    $stmt = $conn->prepare("DELETE FROM copy_traders WHERE id = ?");
    $stmt->bind_param("i", $trader_id);

    if ($stmt->execute()) {
        $message = "Trader deleted successfully!";
        $type = "success";
    } else {
        $message = "Error deleting trader!";
        $type = "danger";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../copy_traders.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
