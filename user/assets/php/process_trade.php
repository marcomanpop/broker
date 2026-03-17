<?php
include "../../../assets/php/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    function cleanInput($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // $user_id = $_SESSION['user_id']; // Assuming user session is set
    $user_id = cleanInput($_POST['user_id']);
    $stock = cleanInput($_POST['stock']);
    $tradeType = cleanInput($_POST['tradeType']);
    $amount = floatval($_POST['amount']);
    $duration = intval($_POST['duration']);
    $result = cleanInput($_POST['result']);
    $profit = floatval($_POST['profit']);

    // Deduct trade amount from balance immediately
    $updateBalance = $conn->prepare("UPDATE users SET balance = balance - ? WHERE id = ?");
    $updateBalance->bind_param("di", $amount, $user_id);
    $updateBalance->execute();
    $updateBalance->close();

    // Store trade result in database
    $query = "INSERT INTO live_trading (user_id, stock, trade_type, amount, duration, result, profit, status, created_at)     VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', NOW())";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("issdids", $user_id, $stock, $tradeType, $amount, $duration, $result, $profit);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to process trade."]);
    }

    $stmt->close();
    $conn->close();
}
