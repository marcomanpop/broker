<?php
session_start();
header('Content-Type: application/json');
include "assets/php/connection.php";

if (!isset($_SESSION['user_id'])) {
    session_unset();
    session_destroy();
    header("Location: ../auth/login.php");
    exit();
}

// Get user_id from the session
$user_id = $_SESSION['user_id'] ?? 0;

// Prepare the query to fetch crypto balances
$sql = "SELECT btc, eth, usdt, bnb, ltc, doge, xrp, shib, sol FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["error" => "SQL error: " . $conn->error]);
    exit;
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$balances = $result->fetch_assoc();

$stmt->close();
$conn->close();

// If no user is found
if (!$balances) {
    echo json_encode(["error" => "User not found"]);
    exit;
}

// Return balances as JSON
echo json_encode($balances);