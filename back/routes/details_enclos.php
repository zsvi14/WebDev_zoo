<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "bddzoo";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

// Récupérer l'ID de l'enclos
$enclosId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($enclosId <= 0) {
    echo "Enclos invalide.";
    exit;
}

// Requête pour les animaux de l'enclos
$query = "SELECT a.nom AS animal, e.nom_enclos, b.nom AS biome
          FROM animaux a
          JOIN enclos e ON a.id_enclos = e.id
          JOIN biomes b ON e.id_biomes = b.id
          WHERE e.id = :enclosId";

$stmt = $pdo->prepare($query);
$stmt->execute(['enclosId' => $enclosId]);
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$details) {
    echo "Aucun animal trouvé pour cet enclos.";
    exit;
}

// Définition de photos par défaut (sans modifier la BDD)
$animalPhotos = [
    'lion' => 'photos/lion.jpg',
    'éléphant' => 'photos/elephant.jpg',
    'zèbre' => 'photos/zebra.jpg',
    'girafe' => 'photos/giraffe.jpg',
];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS_JS/style_siham.css">
    <title>Détails de l'enclos</title>
</head>
<body>
    <button onclick="window.history.back();">Retour</button>
    <h1>Détails de l'enclos : <?= htmlspecialchars($details[0]['nom_enclos']) ?></h1>
    <p>Biome : <?= htmlspecialchars($details[0]['biome']) ?></p>

    <h2>Animaux</h2>
    <?php foreach ($details as $animal): ?>
        <div class="animal">
            <h3><?= htmlspecialchars($animal['animal']) ?></h3>
            <?php
            $animalName = strtolower($animal['animal']);
            $photo = isset($animalPhotos[$animalName]) ? $animalPhotos[$animalName] : 'photos/default.jpg';
            ?>
            <img src="<?= htmlspecialchars($photo) ?>" alt="Photo de <?= htmlspecialchars($animal['animal']) ?>" style="max-width: 200px;">
        </div>
    <?php endforeach; ?>
</body>
</html>
