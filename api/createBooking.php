<?php
header('Content-Type: application/json');
require_once '../db/connection.php';

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate
if (!isset($data['customer_id'], $data['car_id'], $data['booking_date'], $data['return_date'], $data['total_price'])) {
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

try {
    // Insert booking
    $stmt = $pdo->prepare("INSERT INTO bookings (customer_id, car_id, booking_date, return_date, total_price, status) VALUES (?, ?, ?, ?, ?, 'confirmed')");
    $stmt->execute([
        $data['customer_id'],
        $data['car_id'],
        $data['booking_date'],
        $data['return_date'],
        $data['total_price']
    ]);

    // Optionally, update car status
    $updateCar = $pdo->prepare("UPDATE cars SET status = 'booked' WHERE id = ?");
    $updateCar->execute([$data['car_id']]);

    echo json_encode(['success' => true, 'message' => 'Booking created']);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
