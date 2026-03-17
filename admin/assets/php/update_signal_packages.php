<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_id = (int) $_POST['signal_package_id'];
    $name = trim($_POST['name']);
    $roi = (int) $_POST['roi'];
    $accuracy = (int) $_POST['accuracy'];
    $price = (float) $_POST['price'];
    $duration = (int) ($_POST['duration']); // Assuming duration is a string (e.g., "30 days")

    // Validate inputs
    if ($package_id <= 0 || empty($name) || $roi <= 0 || $accuracy <= 0 || $price <= 0 || $duration <= 0) {
        die("Invalid input values.");
    }

    // Update signal package in database
    $sql = "UPDATE signal_packages SET name=?, roi=?, accuracy=?, price=?, duration=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siidii", $name, $roi, $accuracy, $price, $duration, $package_id);

    if ($stmt->execute()) {
        $message = "Signal package updated successfully";
        $type = "success";
    } else {
        $message = "Error updating signal package!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../signal_packages.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
