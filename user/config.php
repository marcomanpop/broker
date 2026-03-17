<?php
session_start();

include "assets/php/connection.php";

if (!isset($_SESSION['user_id'])) {
    session_unset();
    session_destroy();
    header("Location: ../auth/login.php");
    exit();
}

// Get user_id from the session
$user_id = $_SESSION['user_id'] ?? 0;

// Fetch user details from the database
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // If no user is found, redirect to login page
    session_unset();
    session_destroy();
    header("Location: ../auth/login.php?message=" . urlencode("No user found!") . "&message_type=danger");
    exit();
}
