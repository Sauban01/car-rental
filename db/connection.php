<?php
$host = getenv('DB_HOST');          // Use environment variable for host
$db = getenv('DB_NAME');            // Use environment variable for db name
$user = getenv('DB_USER');          // Use environment variable for user
$pass = getenv('DB_PASS');          // Use environment variable for password
$port = getenv('DB_PORT');          // Use environment variable for port

// Create a connection string
$dsn = "pgsql:host=$host;dbname=$db;port=$port";

// Try to establish a connection using PDO
try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error handling
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
?>