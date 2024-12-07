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

// Vérifie si un ID d'enclos est passé dans l'URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID d'enclos manquant.";
    exit;
}

$enclosId = (int)$_GET['id'];

// Requête pour récupérer les détails des animaux dans l'enclos
$query = "SELECT e.nom_enclos, b.nom AS biome, a.nom AS animal
          FROM enclos e
          JOIN biomes b ON e.id_biomes = b.id
          JOIN animaux a ON a.id_enclos = e.id
          WHERE e.id = :enclosId";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':enclosId', $enclosId, PDO::PARAM_INT);
$stmt->execute();
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérifie si des données ont été trouvées
if (empty($details)) {
    echo "Aucun animal trouvé pour cet enclos.";
    exit;
}

// Affiche les détails de l'enclos
$enclos = $details[0];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS_JS/style_siham.css">
    <title>Détails de l'enclos : <?= htmlspecialchars($enclos['nom_enclos']) ?></title>
</head>
<body>
    <h1>Détails de l'enclos : <?= htmlspecialchars($enclos['nom_enclos']) ?></h1>
    <p>Biome : <?= htmlspecialchars($enclos['biome']) ?></p>

    <h2>Animaux</h2>
    <?php foreach ($details as $animal) : ?>
        <div>
            <h3><?= htmlspecialchars($animal['animal']) ?></h3>
            <img src="photos/<?= strtolower($animal['animal']) ?>.jpg" alt="Photo de <?= htmlspecialchars($animal['animal']) ?>" style="width:150px;height:150px;">
        </div>
    <?php endforeach; ?>
</body>
</html>
