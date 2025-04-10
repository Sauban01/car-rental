<?php
$host = 'localhost';          // Database host
$db = 'car_rental_system';    // Database name
$user = 'postgres';  // PostgreSQL username
$pass = 'sauban';  // PostgreSQL password

try {
    // PostgreSQL connection string
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Set error mode to Exception
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
?>
