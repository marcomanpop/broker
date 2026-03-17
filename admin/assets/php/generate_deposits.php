<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $num_deposits = intval($_POST['num_deposits']);

    // Ensure number of deposits is within range
    if ($num_deposits < 1 || $num_deposits > 50) {
        $message = "Invalid number of deposits!";
        $type = "error";
        header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    }

    // Possible payment methods
    $methods = ["BITCOIN", "ETHEREUM", "LITECOIN", "BITCOINCASH", "XRP_Ripple", "SOL_Solana", "USDT_Tether", "Dogecoin", "Shiba"];
    $statuses = ["approved", "declined"];

    $stmt = $conn->prepare("INSERT INTO transactions (transaction_type, username, user_id, amount, status, method, created_at) VALUES ('deposit', ?, ?, ?, ?, ?, NOW())");

    for ($i = 0; $i < $num_deposits; $i++) {
        $amount = rand(10, 1000); // Random deposit amount
        $status = $statuses[array_rand($statuses)]; // Random approval status
        $method = $methods[array_rand($methods)]; // Random payment method

        $stmt->bind_param("sidss", $username, $user_id, $amount, $status, $method);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    $message = "$num_deposits deposit transactions generated!";
    $type = "success";
    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
}
