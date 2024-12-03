<?php
// Paramètres de connexion à la base de données
$host = "localhost"; // ou l'adresse IP de ton serveur MySQL
$dbname = "bddzoo"; // nom de ta base de données
$username = "root"; // ton nom d'utilisateur MySQL
$password = ""; // ton mot de passe MySQL

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si la connexion échoue, afficher le message d'erreur
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

// Requête pour récupérer les enclos avec la couleur des biomes
$query = "SELECT e.id, e.nom_enclos, e.nom_animal, b.nom AS biome, a.nom AS animal 
          FROM enclos e
          JOIN biomes b ON e.id_biomes = b.id
          JOIN animaux a ON e.id_animaux = a.id";

// Exécution de la requête
$stmt = $pdo->query($query);

// Récupération des résultats
$enclosList = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats en JSON
header('Content-Type: application/json');
echo json_encode($enclosList);
?>



