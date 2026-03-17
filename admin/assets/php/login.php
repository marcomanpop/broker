<?php
session_start();

include 'config/connection.php';

ini_set('log_errors', 1);
ini_set('error_log', '/');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $conn->real_escape_string($_POST['signin-email']);
$user_password = $_POST['signin-password'];

$sql = "SELECT * FROM admin WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
    if ($user_password === $admin['password']) {
        // User authentication successful
        $_SESSION['admin_id'] = $admin['id'];

        header("Location: ../../dashboard.php");
        exit();
    } else {
        $message = "pe";
        header("Location: ../../login.php?message=" . urlencode($message));
        exit();
    }
} else {
    echo "<script>
                document.getElementById('error-message').classList.remove('hidden');
            </script>";
}

$conn->close();
