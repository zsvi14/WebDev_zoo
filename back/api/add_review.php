<!--ajouter un avis -->
<?php
ini_set('display_errors', 0); // Désactive l'affichage des erreurs
header("Content-Type: application/json"); // Définit le type de contenu comme JSON

// Récupération des données JSON envoyées par POST
$data = json_decode(file_get_contents("php://input"), true);

// Vérification de l'existence des données requises
$rating = isset($data['rating']) ? $data['rating'] : null;
$review = isset($data['review']) ? $data['review'] : null;
$enclosureId = isset($data['enclosureId']) ? $data['enclosureId'] : null;
$userId = 1; // Remplacer par l'ID de l'utilisateur connecté

// Vérifiez que toutes les données nécessaires sont présentes
if ($rating === null || $review === null || $enclosureId === null) {
    echo json_encode(["status" => "error", "message" => "Les champs rating, review et enclosureId sont requis."]);
    exit;
}

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=localhost;dbname=zoo_db", "username", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insertion de l'avis
    $sql = "INSERT INTO enclosur_review (user_id, enclosure_id, rating, review) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$userId, $enclosureId, $rating, $review])) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'insertion de l'avis."]);
    }
    exit;
} catch (PDOException $e) {
    // Gérer les erreurs de connexion ou d'insertion
    echo json_encode(["status" => "error", "message" => "Erreur de connexion à la base de données : " . $e->getMessage()]);
    exit;
}

