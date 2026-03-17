<?php
// include "../../../assets/php/connection.php";

// $user_id = 1; // Replace with session user ID
// $miner_id = $_POST['miner_id'];
// $amount = $_POST['amount'];

// if (!$miner_id || !$amount) {
//     echo json_encode(["success" => false, "message" => "Invalid data"]);
//     exit;
// }

// // Get miner details
// $sql = "SELECT name,  min_amount, max_amount, roi, cycle, cryptocurrency FROM miners WHERE id = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $miner_id);
// $stmt->execute();
// $result = $stmt->get_result();
// $miner = $result->fetch_assoc();

// if (!$miner) {
//     echo json_encode(["success" => false, "message" => "Miner not found"]);
//     exit;
// }

// if ($amount < $miner['min_amount'] || $amount > $miner['max_amount']) {
//     echo json_encode(["success" => false, "message" => "Investment amount out of range"]);
//     exit;
// }

// // Insert into user_miners table
// $start_date = date("Y-m-d");
// $end_date = date("Y-m-d", strtotime("+{$miner['cycle']} days"));

// $sql = "INSERT INTO mining_history (user_id, miner_id, amount, currency, duration, start_date, end_date, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'active')";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("iidsiss", $user_id, $miner_id, $amount, $miner['cryptocurrency'], $miner['cycle'],  $start_date, $end_date);

// if ($stmt->execute()) {
//     echo json_encode(["success" => true]);
// } else {
//     echo json_encode(["success" => false, "message" => "Database error"]);
// }
include "../../../assets/php/connection.php";

header("Content-Type: application/json");

// Check if request method is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
    exit;
}

// Retrieve and validate input
$user_id = 1; // Should be retrieved dynamically (e.g., from session)
$miner_id = isset($_POST['miner_id']) ? (int)$_POST['miner_id'] : 0;
$amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;

if (!$miner_id || !$amount) {
    echo json_encode(["success" => false, "message" => "Invalid input data"]);
    exit;
}

// Get miner details
$sql = "SELECT name, min_amount, max_amount, roi, cycle, cryptocurrency FROM miners WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $miner_id);
$stmt->execute();
$result = $stmt->get_result();
$miner = $result->fetch_assoc();

if (!$miner) {
    echo json_encode(["success" => false, "message" => "Miner not found"]);
    exit;
}

// Validate investment amount
if ($amount < $miner['min_amount'] || $amount > $miner['max_amount']) {
    echo json_encode(["success" => false, "message" => "Investment amount must be between {$miner['min_amount']} and {$miner['max_amount']}"]);
    exit;
}

// Insert into mining history
$start_date = date("Y-m-d");
$end_date = date("Y-m-d", strtotime("+{$miner['cycle']} days"));

$sql = "INSERT INTO mining_history (user_id, miner_id, amount, currency, duration, start_date, end_date, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'active')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iidsiss", $user_id, $miner_id, $amount, $miner['cryptocurrency'], $miner['cycle'], $start_date, $end_date);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Database error: " . $stmt->error]);
}
