<?php
include("connection.php");

// session_start();
// $user_id = $_SESSION['user_id'];
$trader_id = $_POST['trader_id'];
$user_id = $_POST["user_id"];

if (!$user_id || !$trader_id) {
    echo json_encode(["status" => "error", "message" => "Invalid request $user_id & $trader_id"]);
    exit;
}

// Check if user is already copying another trader
$check_query = "SELECT trader_id FROM user_copy_traders WHERE user_id = ?";
$stmt = $conn->prepare($check_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($current_trader);
$stmt->fetch();
$stmt->close();

if ($current_trader) {
    echo json_encode(["status" => "error", "message" => "You can only copy one trader at a time."]);
    exit;
}

// Insert new copy record
$insert_query = "INSERT INTO user_copy_traders (user_id, trader_id) VALUES (?, ?)";
$stmt = $conn->prepare($insert_query);
$stmt->bind_param("ii", $user_id, $trader_id);
$stmt->execute();

echo json_encode(["status" => "success"]);
?>
