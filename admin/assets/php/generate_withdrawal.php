<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $num_withdrawals = intval($_POST['num_withdrawals']);

    // Ensure number of withdrawals is within range
    if ($num_withdrawals < 1 || $num_withdrawals > 50) {
        $message = "Invalid number of withdrawals!";
        $type = "error";
        header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    }

    // Possible withdrawal methods
    $methods = ["BITCOIN", "ETHEREUM", "LITECOIN", "BITCOINCASH", "XRP_Ripple", "SOL_Solana", "USDT_Tether", "Dogecoin", "Shiba"];
    $statuses = ["approved", "declined"];

    $stmt = $conn->prepare("INSERT INTO transactions (transaction_type, username, user_id, amount, status, method, created_at) VALUES ('withdrawal', ?, ?, ?, ?, ?, NOW())");

    for ($i = 0; $i < $num_withdrawals; $i++) {
        $amount = rand(10, 1000); // Random withdrawal amount
        $status = $statuses[array_rand($statuses)]; // Random approval status
        $method = $methods[array_rand($methods)]; // Random payment method

        $stmt->bind_param("sidss", $username, $user_id, $amount, $status, $method);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    $message = "$num_withdrawals withdrawal transactions generated!";
    $type = "success";
    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
}
