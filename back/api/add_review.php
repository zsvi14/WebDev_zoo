<?php
// Ajouter un avis
ini_set('display_errors', 0);
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$rating = isset($data['rating']) ? $data['rating'] : null;
$review = isset($data['review']) ? $data['review'] : null;
$enclosureId = isset($data['enclosureId']) ? $data['enclosureId'] : null;
$userId = 1; // Remplacez par l'ID de l'utilisateur connecté.

if ($rating === null || $review === null || $enclosureId === null) {
    echo json_encode(["status" => "error", "message" => "Les champs rating, review sont requis."]);
    exit;
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=zoo_db", "username", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO enclosur_review (rating, review) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$userId, $enclosureId, $rating, $review])) {

        // Renvoyer les données de l'avis inséré.
        echo json_encode([
            "status" => "success",
            "review" => [
                "rating" => $rating,
                "review" => $review,
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'insertion de l'avis."]);
    }
    exit;
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Erreur de connexion à la base de données : " . $e->getMessage()]);
    exit;
}
?>
