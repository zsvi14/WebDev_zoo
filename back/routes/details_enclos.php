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

// Vérification de l'ID
if (!isset($_GET['id'])) {
    echo json_encode(['error' => 'ID de l\'enclos non fourni']);
    exit;
}

$enclosId = intval($_GET['id']); // Récupérer l'ID de l'enclos depuis l'URL

// Requête pour récupérer les détails de l'enclos
$query = "
    SELECT 
        e.nom_animal AS nom_animal,
        e.nom_enclos AS nom_enclos,
        b.nom AS biome,
        a.nom AS animal,
        a.origine,
        a.alimentation,
        a.description
    FROM enclos e
    LEFT JOIN biomes b ON e.id_biomes = b.id  -- Correction de la colonne ici
    LEFT JOIN animaux a ON e.id = a.id_enclos
    WHERE e.id = :id
";

// Préparer la requête avec l'ID de l'enclos
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $enclosId]);

// Récupération des résultats
$enclosDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats en JSON
if ($enclosDetails) {
    echo json_encode($enclosDetails);
} else {
    echo json_encode(['error' => 'Aucun détail trouvé pour cet enclos']);
}
?>


