<?php
require 'config/connection.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signal_package_id'])) {
    $signal_package_id = intval($_POST['signal_package_id']);

    $stmt = $conn->prepare("DELETE FROM signal_packages WHERE id = ?");
    $stmt->bind_param("i", $signal_package_id);

    if ($stmt->execute()) {
        $message = "Signal package deleted successfully!";
        $type = "success";
    } else {
        $message = "Error deleting signal package!";
        $type = "danger";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../signal_packages.php?message=" . urlencode($message) . "&type=" . urlencode($type));
    exit();
}
