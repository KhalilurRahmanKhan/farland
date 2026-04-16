
<?php

$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost' || $host == '127.0.0.1') {
    require "config.local.php";
} else {
   require(__DIR__ . "/config.live.php");
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    die("Database connection failed");
}
?>
