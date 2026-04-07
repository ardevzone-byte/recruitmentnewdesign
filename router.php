<?php
/**
 * PHP Built-in Server Router for CodeIgniter
 * Use: php -S localhost:8080 -t . router.php
 */
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve existing files and directories
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Route everything else to index.php
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';
