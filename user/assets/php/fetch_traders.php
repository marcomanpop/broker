<?php
include("connection.php"); // Include your database connection


$user_id = $_POST["user_id"];
// $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

// Fetch copy traders
$query = "SELECT * FROM copy_traders";
$result = $conn->query($query);
$traders = [];

while ($row = $result->fetch_assoc()) {
    $traders[] = $row;
}

// Fetch the trader the user is currently copying
$copied_trader_query = "SELECT trader_id FROM user_copy_traders WHERE user_id = ?";
$stmt = $conn->prepare($copied_trader_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($copied_trader_id);
$stmt->fetch();
$stmt->close();

echo json_encode([
    'traders' => $traders,
    'copied_trader_id' => $copied_trader_id ?? null
]);
?>
