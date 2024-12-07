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
$idEnclos = $_GET['id']; // Assure-toi que l'ID est passé dans l'URL

// Requête pour récupérer les détails de l'enclos
$query = "SELECT e.id, e.nom_enclos, b.nom AS biome, a.id AS animal_id, a.nom AS animal
          FROM enclos e
          JOIN biomes b ON e.id_biomes = b.id
          JOIN animaux a ON e.id_animaux = a.id
          WHERE e.id = :id";

// Préparer et exécuter la requête
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $idEnclos, PDO::PARAM_INT);
$stmt->execute();

// Récupérer les résultats
$enclosDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Afficher les détails de l'enclos
foreach ($enclosDetails as $detail) {
    echo "<h1>" . $detail['nom_enclos'] . " (Biome : " . $detail['biome'] . ")</h1>";
    echo "<h2>Animaux dans cet enclos :</h2>";
    echo "<ul>";
    echo "<li>" . $detail['animal'] . "</li>";
    // Assumer que l'image est dans le dossier 'images/animaux/' et que l'image est nommée selon l'ID de l'animal
    $imagePath = "images/animaux/" . strtolower($detail['animal']) . ".jpg"; // Exemple de nommage basé sur le nom de l'animal
    if (file_exists($imagePath)) {
        echo "<img src='" . $imagePath . "' alt='Photo de " . $detail['animal'] . "' />";
    } else {
        echo "<p>Image non disponible pour cet animal.</p>";
    }
    echo "</ul>";
}
?>