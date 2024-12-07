<?php
// Paramètres de connexion à la base de données
$host = "localhost";
$dbname = "bddzoo";
$username = "root";
$password = "";

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

// Récupérer l'ID de l'enclos depuis l'URL
$enclosId = $_GET['id'] ?? null;
if ($enclosId === null) {
    echo "Aucun enclos spécifié.";
    exit;
}

// Récupérer les informations de l'enclos
$query = "SELECT e.nom_enclos, b.nom AS biome, a.nom AS animal, a.photo 
          FROM enclos e
          JOIN biomes b ON e.id_biomes = b.id
          JOIN animaux a ON e.id_animaux = a.id
          WHERE e.id = :enclosId";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':enclosId', $enclosId, PDO::PARAM_INT);
$stmt->execute();

// Récupérer les résultats
$enclos = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (empty($enclos)) {
    echo "Enclos introuvable.";
    exit;
}

// Affichage des détails de l'enclos
$nomEnclos = $enclos[0]['nom_enclos'];
$biome = $enclos[0]['biome'];
echo "<h1>Détails de l'enclos: $nomEnclos</h1>";
echo "<p>Biome : $biome</p>";

foreach ($enclos as $animal) {
    echo "<h2>Animal : " . $animal['animal'] . "</h2>";
    echo "<img src='" . $animal['photo'] . "' alt='Photo de " . $animal['animal'] . "' />";
}
?>
