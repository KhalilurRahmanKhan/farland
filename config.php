<?php

$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost') {
    define('BASE_URL', '/farland/');
} else {
    define('BASE_URL', '/');
}