<?php
require 'config/connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $message = $_POST['popup_message'];
    $show_popup = $_POST['show_popup']; // 1 for Yes, 0 for No

    $stmt = $conn->prepare("UPDATE users SET popup_message = ?, show_popup = ? WHERE id = ?");
    $stmt->bind_param("sii", $message, $show_popup, $user_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    $message = "Popup message sent!!";
    $type = "success";

    header("Location: ../../edit_user.php?user_id=" . urlencode($user_id) . "&message=" . urlencode($message) . "&type=" . urlencode($type));
}
