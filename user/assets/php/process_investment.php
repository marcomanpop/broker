<?php
include "../../../assets/php/connection.php";

$response = ["status" => "error", "message" => "Invalid request"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package = $_POST["package"];
    $amount = $_POST["amount"];
    $daily_profit = $_POST["daily_profit"];
    $total_profit = $_POST["total_profit"];
    $duration = $_POST["duration"];
    $user_id = $_POST["user_id"];

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO investments (package, amount, daily_profit, total_profit, duration, user_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdddds", $package, $amount, $daily_profit, $total_profit, $duration, $user_id);

    if ($stmt->execute()) {
        $response = ["status" => "success"];
    } else {
        $response = ["status" => "error", "message" => "Database error"];
    }
}

echo json_encode($response);
