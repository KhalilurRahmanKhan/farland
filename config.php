<?php
// Detect environment automatically
$host = $_SERVER['HTTP_HOST'];

// ✅ LOCAL (XAMPP)
if ($host === 'localhost' || $host === '127.0.0.1') {
    define('BASE_URL', '/farland/'); // <-- change ONLY if your folder name is different
} 
// ✅ LIVE SERVER
else {
    define('BASE_URL', '/');
}

// ✅ Absolute server path (DO NOT CHANGE)
define('BASE_PATH', __DIR__);
?>