<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $miner_id = (int) $_POST['miner_id'];
    $name = trim($_POST['name']);
    $roi = (float) $_POST['roi'];
    $max_amount = (float) $_POST['max_amount'];
    $min_amount = (float) $_POST['min_amount'];
    $cycle = (int) $_POST['cycle'];

    // Validate inputs
    if ($miner_id <= 0 || empty($name) || $roi <= 0 || $max_amount <= 0 || $min_amount <= 0 || $cycle <= 0) {
        die("Invalid input values.");
    }

    // Update miner in database
    $sql = "UPDATE miners SET name=?, roi=?, max_amount=?, min_amount=?, cycle=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sddddi", $name, $roi, $max_amount, $min_amount, $cycle, $miner_id);

    if ($stmt->execute()) {
        $message = "Miner updated successfully";
        $type = "success";
    } else {
        $message = "Error updating Miner!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../miners.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
