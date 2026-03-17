<?php
/**
 * Database Connection Handler
 * Include this file in any PHP script that needs database access
 * Usage: include __DIR__ . '/db.php';
 */

// Include main config
if (!defined('APP_NAME')) {
    if (file_exists(__DIR__ . '/config.php')) {
        include __DIR__ . '/config.php';
    } else {
        die('Configuration file not found');
    }
}

// Create connection with environment variable support
$db_host = getenv('DB_HOST') ?: DB_HOST;
$db_port = getenv('DB_PORT') ?: DB_PORT;
$db_user = getenv('DB_USER') ?: DB_USER;
$db_pass = getenv('DB_PASS') ?: DB_PASS;
$db_name = getenv('DB_NAME') ?: DB_NAME;

// Establish Connection
$conn = @mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

// Check Connection
if (!$conn) {
    $error = mysqli_connect_error();
    if (DEBUG || ini_get('display_errors')) {
        die("Database Connection Failed: " . $error);
    } else {
        http_response_code(500);
        die("Service Unavailable");
    }
}

// Set Character Set
$conn->set_charset("utf8mb4");

// Log success if debugging
if (DEBUG) {
    error_log("Database connected successfully to " . $db_name);
}

?>
