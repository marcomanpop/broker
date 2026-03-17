<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    // SQL query to reset all balances, including cryptocurrencies
    $sql = "UPDATE users SET 
                balance = 0, 
                profit_balance = 0, 
                total_investment = 0, 
                btc = 0, 
                eth = 0, 
                usdt = 0, 
                bnb = 0, 
                ltc = 0, 
                doge = 0, 
                xrp = 0, 
                shib = 0, 
                sol = 0 WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        $message = "All balances reset to 0!";
        $type = "success";
    } else {
        $message = "Error Updating Balances!";
        $type = "error";
    }

    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
