<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $roi = (float) $_POST['roi'];
    $max_amount = (float) $_POST['max_amount'];
    $min_amount = (float) $_POST['min_amount'];
    $cycle = (int) $_POST['cycle'];
    $cryptocurrency = trim($_POST['cryptocurrency']);

    // Validate inputs
    if (empty($name) || $roi <= 0 || $max_amount <= 0 || $min_amount <= 0 || $cycle <= 0 || empty($cryptocurrency)) {
        die("Invalid input values.");
    }

    // Insert into database
    $sql = "INSERT INTO miners (name, roi, max_amount, min_amount, cycle, cryptocurrency) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdddds", $name, $roi, $max_amount, $min_amount, $cycle, $cryptocurrency);

    if ($stmt->execute()) {
        $message = "Miner added successfully";
        $type = "success";
    } else {
        $message = "Error adding Miner!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../miners.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
