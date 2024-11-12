<!--ajouter un avis -->
<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$rating = $data['rating'];
$review = $data['review'];
$enclosureId = $data['enclosureId'];
$userId = 1; // Replace with session user ID

// Database connection
$pdo = new PDO("mysql:host=localhost;dbname=zoo_db", "username", "password");

// Insert review
$sql = "INSERT INTO enclosure_reviews (user_id, enclosure_id, rating, review) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$userId, $enclosureId, $rating, $review])) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>
