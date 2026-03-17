<?php
/**
 * Health Check Endpoint
 * Returns JSON status of system health
 */

header('Content-Type: application/json');

$health = [
    'status' => 'ok',
    'timestamp' => date('Y-m-d H:i:s'),
    'services' => []
];

// Check PHP version
$health['services']['php'] = [
    'version' => phpversion(),
    'status' => 'ok'
];

// Check database connection
$connection_file = __DIR__ . '/connection-manager.php';
if (file_exists($connection_file)) {
    @include $connection_file;
    
    if (!empty($conn)) {
        $health['services']['database'] = [
            'status' => 'ok',
            'host' => $servername,
            'database' => $dbname
        ];
    } else {
        $health['services']['database'] = [
            'status' => 'error',
            'message' => 'Connection failed'
        ];
        $health['status'] = 'error';
    }
} else {
    $health['services']['database'] = [
        'status' => 'unknown',
        'message' => 'Connection file not found'
    ];
}

// Check required directories
$required_dirs = [
    'admin/assets/uploads',
    'user/assets',
    'assets'
];

foreach ($required_dirs as $dir) {
    $path = __DIR__ . '/' . $dir;
    $health['services']['directory_' . str_replace('/', '_', $dir)] = [
        'status' => is_dir($path) ? 'ok' : 'missing',
        'path' => $dir
    ];
}

// Check critical files
$required_files = [
    'index.php',
    'auth/login.php',
    'user/dashboard.php',
    'admin/dashboard.php'
];

foreach ($required_files as $file) {
    $path = __DIR__ . '/' . $file;
    $health['services']['file_' . str_replace(['/', '.'], '_', $file)] = [
        'status' => file_exists($path) ? 'ok' : 'missing',
        'file' => $file
    ];
}

http_response_code($health['status'] === 'ok' ? 200 : 500);
echo json_encode($health, JSON_PRETTY_PRINT);
?>
