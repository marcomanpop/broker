<?php
/**
 * Legacy Connection File - Redirect to main config
 * This file maintains backward compatibility with old includes
 */

// Find root directory
$root = dirname(dirname(dirname(__FILE__)));
if (file_exists($root . '/db.php')) {
    include $root . '/db.php';
} else {
    // Fallback - find it
    require_once dirname(__FILE__) . '/../../../db.php';
}
?>
