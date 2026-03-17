<?php
/**
 * Database Connection Manager
 * Handles connection to MySQL/MariaDB
 * Supports both Docker and traditional hosting
 */

// Determine environment - check if in Docker or local
$env = getenv('DOCKER_ENV') ?: 'local';

// Database configuration
if ($env === 'docker' || getenv('MYSQL_HOST')) {
    // Docker environment
    $servername = getenv('MYSQL_HOST') ?: "mysql";
    $username = getenv('MYSQL_USER') ?: "bitpromarketprim_user";
    $password = getenv('MYSQL_PASSWORD') ?: "bitpromarketprim_user";
    $dbname = getenv('MYSQL_DATABASE') ?: "bitpromarketprim_database";
} else {
    // Traditional hosting
    $servername = getenv('DB_HOST') ?: "localhost:3306";
    $username = getenv('DB_USER') ?: "bitpromarketprim_user";
    $password = getenv('DB_PASSWORD') ?: "bitpromarketprim_user";
    $dbname = getenv('DB_NAME') ?: "bitpromarketprim_database";
}

// Create connection
$conn = @mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    $error_message = "Database Connection Failed";
    $error_details = mysqli_connect_error();
    
    // Log error
    error_log("Database Connection Error: " . $error_details);
    
    // Show error to user only if in development
    if (ini_get('display_errors')) {
        die("<h1>$error_message</h1><p>$error_details</p>");
    } else {
        // Production - show generic message
        die("<h1>Service Unavailable</h1><p>We're experiencing technical difficulties. Please try again later.</p>");
    }
}

// Set charset to UTF8
$conn->set_charset("utf8mb4");

?>
