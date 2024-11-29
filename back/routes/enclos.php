<?php
// Paramètres de connexion à la base de données
$host = "localhost"; // Adresse du serveur MySQL
$dbname = "bddzoo"; // Nom de la base de données
$username = "root"; // Nom d'utilisateur
$password = ""; // Mot de passe

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur de connexion : " . $e->getMessage()]);
    exit;
}

// Requête pour récupérer les enclos
$query = "SELECT e.id, e.nom_enclos, e.nom_animal, b.nom AS biome, a.nom AS animal 
          FROM enclos e
          JOIN biomes b ON e.id_biomes = b.id
          JOIN animaux a ON e.id_animaux = a.id";

try {
    $stmt = $pdo->query($query);
    $enclosList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les données en format JSON
    header('Content-Type: application/json');
    echo json_encode($enclosList);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur lors de la récupération des données : " . $e->getMessage()]);
}
?>

