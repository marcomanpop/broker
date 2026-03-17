<?php
/**
 * Broker Platform - Core Configuration
 * This is the main configuration file used by all parts of the application
 */

// Application Settings
define('APP_NAME', 'Broker Platform');
define('APP_URL', 'https://civigrantinterest.online');
define('APP_EMAIL', 'support@civigrantinterest.online');

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USER', 'civihqzq_new');
define('DB_PASS', 'Y}.]Uw{]kehD');
define('DB_NAME', 'civihqzq_new');

// Error Display (set to false in production)
define('DEBUG', false);
define('LOG_ERRORS', true);
define('LOG_FILE', __DIR__ . '/error_log');

// Session Settings
define('SESSION_TIMEOUT', 3600);
define('SESSIONS_PATH', '/tmp');

// File Upload Settings
define('UPLOAD_DIR', __DIR__ . '/admin/assets/uploads');
define('MAX_UPLOAD_SIZE', 5242880); // 5MB

// Security
define('ENCRYPTION_KEY', 'broker_platform_key_2026');

// Timezone
date_default_timezone_set('UTC');

// Start Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
