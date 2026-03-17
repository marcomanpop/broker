<?php
include "../../../assets/php/connection.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize input function
function cleanInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Retrieve and validate form data
$method = isset($_POST['paymentmethod']) ? cleanInput($_POST['paymentmethod']) : null;
$user_id = isset($_POST['user_id']) ? cleanInput($_POST['user_id']) : null;
$username = isset($_POST['username']) ? cleanInput($_POST['username']) : null;
$amount = isset($_POST['amount']) ? cleanInput($_POST['amount']) : null;
$transaction_type = isset($_POST['transaction_type']) ? cleanInput($_POST['transaction_type']) : null;

// Validate required fields for all transactions
if (!$method || !$user_id || !$username || !$amount || !$transaction_type) {
    $redirect_page = getRedirectPage($transaction_type);
    header("Location: $redirect_page?message=" . urlencode("All required fields must be filled!") . "&message_type=danger");
    exit();
}

// **Only for Withdrawals**
if ($transaction_type === "withdrawal") {
    
    $otp = isset($_POST['otp']) ? cleanInput($_POST['otp']) : null;

    // Validate OTP
    if (!$otp) {
        $redirect_page = getRedirectPage($transaction_type);
        header("Location: $redirect_page?message=" . urlencode("OTP is required for withdrawals!") . "&message_type=danger");
        exit();
    }

    // Verify OTP from database
    $otp_query = "SELECT otp FROM users WHERE id = ?";
    $stmt = $conn->prepare($otp_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();
    $stmt->close();

    if (!$user_data || $user_data['otp'] != $otp) {
        $redirect_page = getRedirectPage($transaction_type);
        header("Location: $redirect_page?message=" . urlencode("Invalid OTP!") . "&message_type=danger");
        exit();
    }
    
    // if (!$user_data || $user_data['otp'] != $otp) {
    //     $redirect_page = getRedirectPage($transaction_type);
    //     $error_message = "Invalid OTP! Expected: " . $user_data['otp'] . " Provided: " . $otp;
    //     header("Location: $redirect_page?message=" . urlencode($error_message) . "&message_type=danger");
    //     exit();
    // }

    // Bank Transfer Fields (Only if method is Bank-Transfer)
    $bank_name = isset($_POST['bank-name']) ? cleanInput($_POST['bank-name']) : null;
    $account_name = isset($_POST['account-name']) ? cleanInput($_POST['account-name']) : null;
    $account_number = isset($_POST['account-number']) ? cleanInput($_POST['account-number']) : null;

    if ($method === "Bank-Transfer" && (!$bank_name || !$account_name || !$account_number)) {
        $redirect_page = getRedirectPage($transaction_type);
        header("Location: $redirect_page?message=" . urlencode("Bank details are required for Bank Transfer!") . "&message_type=danger");
        exit();
    }
} else {
    // If not a withdrawal, ignore OTP and bank details
    $otp = null;
    $bank_name = null;
    $account_name = null;
    $account_number = null;
}

// Initialize wallet address (Only for crypto transactions)
$wallet_address = isset($_POST['wallet-address']) ? cleanInput($_POST['wallet-address']) : null;

// Insert transaction details into the database
$insert_query = "INSERT INTO transactions (user_id, username, transaction_type, method, wallet_address, bank_name, account_name, account_number, amount, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending')";

$stmt = $conn->prepare($insert_query);
$stmt->bind_param("isssssssd", $user_id, $username, $transaction_type, $method, $wallet_address, $bank_name, $account_name, $account_number, $amount);

if ($stmt->execute()) {
    $redirect_page = getRedirectPage($transaction_type);
    header("Location: $redirect_page?message=" . urlencode("Transaction submitted successfully.") . "&message_type=success");
} else {
    $redirect_page = getRedirectPage($transaction_type);
    header("Location: $redirect_page?message=" . urlencode("Database error. Try again.") . "&message_type=danger");
}

$stmt->close();
$conn->close();

// Function to determine the correct redirect page based on transaction type
function getRedirectPage($transaction_type)
{
    $redirect_pages = [
        "deposit" => "../../deposit.php",
        "withdrawal" => "../../withdrawal.php",
        "upgrade" => "../../account-upgrade.php"
    ];

    return isset($redirect_pages[$transaction_type]) ? $redirect_pages[$transaction_type] : "../../index.php";
}
