<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cleaning_service';

try {
    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $exception) {
    error_log('Database connection failed: ' . $exception->getMessage());
    http_response_code(500);
    exit('The service is temporarily unavailable. Please try again later.');
}
