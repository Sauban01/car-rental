<?php
header('Content-Type: application/json');
require_once '../db/connection.php';

if (!isset($_GET['phone'])) {
    echo json_encode(['error' => 'Phone number required']);
    exit;
}

$phone = $_GET['phone'];

$stmt = $pdo->prepare("SELECT * FROM customers WHERE phone = ?");
$stmt->execute([$phone]);
$customer = $stmt->fetch(PDO::FETCH_ASSOC);

if ($customer) {
    echo json_encode($customer);
} else {
    echo json_encode(['message' => 'Customer not found']);
}
?>
