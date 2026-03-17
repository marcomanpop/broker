<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    // Get and sanitize input values
    $balance = filter_var($_POST['balance'], FILTER_VALIDATE_FLOAT);
    $profit_balance = filter_var($_POST['profit_balance'], FILTER_VALIDATE_FLOAT);
    $total_investment = filter_var($_POST['total_investment'], FILTER_VALIDATE_FLOAT);

    // Check if any field is invalid or negative
    if (
        $balance === false || $balance < 0 ||
        $profit_balance === false || $profit_balance < 0 ||
        $total_investment === false || $total_investment < 0
    ) {
        $message = "Invalid input! Only positive numbers allowed!";
        $type = "error";
        header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
    }

    // Update balances in the database using prepared statements
    $stmt = $conn->prepare("UPDATE users SET balance = ?, profit_balance = ?, total_investment = ? WHERE id = ?");
    $stmt->bind_param("dddi", $balance, $profit_balance, $total_investment, $user_id);

    if ($stmt->execute()) {
        $message = "Balances Updated Successfully!";
        $type = "success";
    } else {
        $message = "Error Updating Balances!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
