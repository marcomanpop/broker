<?php
session_start();
include "../../../assets/php/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $package_name = $_POST['package_name'];
    $price = $_POST['price'];
    $accuracy = $_POST['accuracy'];
    $duration = $_POST['duration'];
    $roi = $_POST['roi'];

    // Fetch user balance
    $stmt = $conn->prepare("SELECT balance FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($user_balance);
    $stmt->fetch();
    $stmt->close();

    // if ($user_balance < $price) {
    //     echo "Insufficient balance.";
    //     exit;
    // }

    // Deduct balance
    $new_balance = $user_balance - $price;
    $stmt = $conn->prepare("UPDATE users SET balance = ? WHERE id = ?");
    $stmt->bind_param("di", $new_balance, $user_id);
    $stmt->execute();
    $stmt->close();

    // Insert subscription details
    $stmt = $conn->prepare("INSERT INTO subscriptions (user_id, package_name, price, accuracy, duration, roi, subscribed_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("isdidd", $user_id, $package_name, $price, $accuracy, $duration, $roi);
    
    if ($stmt->execute()) {
        echo "Subscription successful!";
    } else {
        echo "Error subscribing.";
    }
    
    // if ($stmt->execute()) {
    //     echo json_encode(["status" => "success"]);
    // } else {
    //     echo json_encode(["status" => "error", "message" => "Failed to process trade."]);
    // }

    $stmt->close();
    $conn->close();
}