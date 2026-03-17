<?php
include("connection.php");

// session_start();
// $user_id = $_SESSION['user_id'];
$user_id = $_POST["user_id"];

if (!$user_id) {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}

// Remove the copied trader
$delete_query = "DELETE FROM user_copy_traders WHERE user_id = ?";
$stmt = $conn->prepare($delete_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();

echo json_encode(["status" => "success"]);
?>
