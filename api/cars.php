<?php
header('Content-Type: application/json');
require_once '../db/connection.php';

try {
    // Prepare the query to fetch all cars
    $stmt = $pdo->prepare("SELECT * FROM cars");
    $stmt->execute();
    
    // Fetch all the cars from the database
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results as a JSON response
    echo json_encode($cars);
} catch (PDOException $e) {
    // Handle error and return as JSON
    echo json_encode(['error' => $e->getMessage()]);
}
?>
