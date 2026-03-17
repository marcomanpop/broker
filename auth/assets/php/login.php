<?php
session_start();
include "../../../assets/php/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Function to sanitize input
    function cleanInput($data)
    {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    $username_or_email = isset($_POST['username_or_email']) ? cleanInput($_POST['username_or_email']) : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if (!$username_or_email || !$password) {
        header("Location: ../../login.php?message=" . urlencode("Username/Email and Password are required!") . "&message_type=danger");
        exit();
    }

    // Check if user exists
    $query = "SELECT id, fullname, username, email, password_hash FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username_or_email, $username_or_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        header("Location: ../../login.php?message=" . urlencode("Invalid username/email or password!") . "&message_type=danger");
        exit();
    }

    // Store user details in session
    $_SESSION['user_id'] = $user['id'];
    // $_SESSION['username'] = $user['username'];
    // $_SESSION['fullname'] = $user['fullname'];
    // $_SESSION['email'] = $user['email'];

    // Redirect to dashboard
    header("Location: ../../../user/dashboard.php?message=" . urlencode("Login successful!") . "&message_type=success");
    exit();
} else {
    header("Location: ../../login.php?message=" . urlencode("Try again!") . "&message_type=danger");
    exit();
}
