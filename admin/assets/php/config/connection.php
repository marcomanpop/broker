<?php

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "aprobitmarket_db";

$servername = "localhost:3306";
$username = "bitpromarketprim_user";
$password = "bitpromarketprim_user";
$dbname = "bitpromarketprim_database";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM notifications WHERE recipient_type = 'admin'  AND status = 'unread'";
$notification_result = $conn->query($sql);
$notifications = $notification_result->fetch_all(MYSQLI_ASSOC);
$total_unread = $notification_result->num_rows;
