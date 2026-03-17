<?php
require 'config/connection.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trader_name = trim($_POST['trader_name']);
    $win_rate = floatval($_POST['win_rate']);
    $profit_percent = floatval($_POST['profit_percent']);

    if (empty($trader_name) || $win_rate <= 0 || $profit_percent <= 0) {
        $message = "Invalid input. Please check your entries.";
        $type = "danger";
    } else {
        $stmt = $conn->prepare("INSERT INTO copy_traders (trader_name, win_rate, profit_percent) VALUES (?, ?, ?)");
        $stmt->bind_param("sdd", $trader_name, $win_rate, $profit_percent);

        if ($stmt->execute()) {
            $message = "Trader added successfully!";
            $type = "success";
        } else {
            $message = "Error adding trader!";
            $type = "danger";
        }

        $stmt->close();
    }

    $conn->close();

    header("Location: ../../copy_traders.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
