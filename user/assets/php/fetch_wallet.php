<?php
header("Content-Type: application/json");

// Load wallet addresses from config
include("connection.php");

// Fetch admin wallets
$query = "SELECT * FROM admin LIMIT 1"; // Assuming only one admin row
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$admin_wallets = $result->fetch_assoc();

// Store in array format
$wallets = [
    "BITCOIN" => $admin_wallets['btc'],
    "ETHEREUM" => $admin_wallets['eth'],
    "LITECOIN" => $admin_wallets['ltc'],
    "BITCOINCASH" => $admin_wallets['bch'],
    "XRP_Ripple" => $admin_wallets['xrp'],
    "SOL_Solana" => $admin_wallets['sol'],
    "USDT_Tether" => $admin_wallets['usdt'],
    "Dogecoin" => $admin_wallets['doge'],
    "Shiba" => $admin_wallets['shib']
];

$method = $_GET['method'] ?? 'BITCOIN';
$walletAddress = $wallets[$method] ?? "Wallet not found";

// Generate QR Code URL
$qrCodeURL = "https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=" . urlencode($walletAddress);

echo json_encode([
    "wallet" => $walletAddress,
    "qr_code" => $qrCodeURL
]);
