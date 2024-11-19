<?php
//recupere les avis
header("Content-Type: application/json");

$enclosureId = $_GET['enclosure_id'];

// Database connection
$pdo = new PDO("mysql:host=localhost;dbname=zoo_db", "username", "password");

// Get reviews
$sql = "SELECT rating, review FROM enclosure_reviews WHERE enclosure_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$enclosureId]);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($reviews);
?>
