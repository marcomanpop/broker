<?php
require 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    // Sanitize inputs
    $wallets = [
        'btc_wallet'  => $_POST['btc_wallet'],
        'eth_wallet'  => $_POST['eth_wallet'],
        'usdt_wallet' => $_POST['usdt_wallet'],
        'bnb_wallet'  => $_POST['bnb_wallet'],
        'ltc_wallet'  => $_POST['ltc_wallet'],
        'doge_wallet' => $_POST['doge_wallet'],
        'xrp_wallet'  => $_POST['xrp_wallet'],
        'shib_wallet' => $_POST['shib_wallet'],
        'sol_wallet'  => $_POST['sol_wallet'],
    ];

    // Prepare statement
    $stmt = $conn->prepare("UPDATE admin SET btc=?, eth=?, usdt=?, bch=?, ltc=?, doge=?, xrp=?, shib=?, sol=? WHERE id=?");
    $stmt->bind_param(
        "sssssssssi",
        $wallets['btc_wallet'],
        $wallets['eth_wallet'],
        $wallets['usdt_wallet'],
        $wallets['bnb_wallet'],
        $wallets['ltc_wallet'],
        $wallets['doge_wallet'],
        $wallets['xrp_wallet'],
        $wallets['shib_wallet'],
        $wallets['sol_wallet'],
        $user_id
    );

    // Execute and check result
    if ($stmt->execute()) {
        $message = "Wallet Addresses Updated Successfully!";
        $type = "success";
    } else {
        $message = "Error Updating Wallet Addresses!";
        $type = "error";
    }

    $stmt->close();
    $conn->close();

    // Redirect back with message
    header("Location: ../../dashboard.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
