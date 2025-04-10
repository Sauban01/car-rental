<?php
header('Content-Type: application/json');
require_once '../db/connection.php';

$stmt = $pdo->prepare("SELECT * FROM cars");
$stmt->execute();
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($cars);
?>
