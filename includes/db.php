
<?php
require __DIR__ . '/../config.live.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    die("DB connection failed: " . mysqli_connect_error());
}
?>