<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $roi = (int) $_POST['roi'];
    $accuracy = (int) $_POST['accuracy'];
    $price = (float) $_POST['price'];
    $duration = (int) $_POST['duration']; // Duration as an integer (e.g., days)

    // Validate inputs
    if (empty($name) || $roi <= 0 || $accuracy <= 0 || $price <= 0 || $duration <= 0) {
        die("Invalid input values.");
    }

    // Insert new signal package into the database
    $sql = "INSERT INTO signal_packages (name, roi, accuracy, price, duration) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siidi", $name, $roi, $accuracy, $price, $duration);

    if ($stmt->execute()) {
        $message = "Signal package added successfully";
        $type = "success";
    } else {
        $message = "Error adding signal package!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the signal packages page
    header("Location: ../../signal_packages.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
