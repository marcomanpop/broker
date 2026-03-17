<?php
/**
 * Core application entry point
 * Redirects to appropriate section based on URL
 */

session_start();

// Define root path
define('ROOT_PATH', __DIR__);
define('ASSETS_PATH', ROOT_PATH . '/assets');

// Set error reporting for production
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Try to include connection manager
$connection_file = ROOT_PATH . '/connection-manager.php';
if (file_exists($connection_file)) {
    include $connection_file;
}

// Determine which section to load
$request_uri = trim($_SERVER['REQUEST_URI'], '/');
$request_path = parse_url($request_uri, PHP_URL_PATH);

// Route requests
if (empty($request_path) || $request_path === '/' || $request_path === 'index.php') {
    // Load custom homepage or default
    if (file_exists(ROOT_PATH . '/landing.php')) {
        include ROOT_PATH . '/landing.php';
    } else {
        include ROOT_PATH . '/index.htm';
    }
} elseif (strpos($request_path, '/admin') === 0) {
    include ROOT_PATH . '/admin/login.php';
} elseif (strpos($request_path, '/user') === 0) {
    include ROOT_PATH . '/user/dashboard.php';
} elseif (strpos($request_path, '/auth') === 0) {
    include ROOT_PATH . '/auth/login.php';
} else {
    // Try to load the requested PHP file if it exists
    $file_path = ROOT_PATH . '/' . ltrim($request_path, '/');
    if (file_exists($file_path) && is_file($file_path)) {
        include $file_path;
    } else {
        // File not found
        http_response_code(404);
        include ROOT_PATH . '/index.htm';
    }
}
?>
