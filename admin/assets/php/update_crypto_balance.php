<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    // Sanitize and validate inputs
    $balances = [
        'btc' => filter_var($_POST['btc'], FILTER_VALIDATE_FLOAT),
        'eth' => filter_var($_POST['eth'], FILTER_VALIDATE_FLOAT),
        'usdt' => filter_var($_POST['usdt'], FILTER_VALIDATE_FLOAT),
        'bnb' => filter_var($_POST['bnb'], FILTER_VALIDATE_FLOAT),
        'ltc' => filter_var($_POST['ltc'], FILTER_VALIDATE_FLOAT),
        'doge' => filter_var($_POST['doge'], FILTER_VALIDATE_FLOAT),
        'xrp' => filter_var($_POST['xrp'], FILTER_VALIDATE_FLOAT),
        'shib' => filter_var($_POST['shib'], FILTER_VALIDATE_FLOAT),
        'sol' => filter_var($_POST['sol'], FILTER_VALIDATE_FLOAT)
    ];

    foreach ($balances as $key => $value) {
        if ($value === false || $value < 0) {
            $message = "Invalid input for $key!";
            $type = "error";
            header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
            exit();
        }
    }

    // Update balances in database
    $stmt = $conn->prepare("UPDATE users SET btc=?, eth=?, usdt=?, bnb=?, ltc=?, doge=?, xrp=?, shib=?, sol=? WHERE id=?");
    $stmt->bind_param(
        "dddddddddi",
        $balances['btc'],
        $balances['eth'],
        $balances['usdt'],
        $balances['bnb'],
        $balances['ltc'],
        $balances['doge'],
        $balances['xrp'],
        $balances['shib'],
        $balances['sol'],
        $user_id
    );

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
