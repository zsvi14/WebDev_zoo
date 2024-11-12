<?php
// Définir le type de réponse comme étant du JSON
header('Content-Type: application/json');

// Connexion à la base de données (modifie avec tes propres informations de connexion)
$host = 'localhost'; // Ou ton hôte de base de données
$dbname = 'parc_animalier'; // Nom de la base de données
$username = 'root'; // Utilisateur de la base de données
$password = ''; // Mot de passe de l'utilisateur de la base de données

try {
    // Créer une nouvelle connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion à la base de données
    echo json_encode(["error" => "Connexion échouée: " . $e->getMessage()]);
    exit;
}

// Requête SQL pour récupérer les enclos et les animaux
$query = "SELECT enclos.id, enclos.nom AS enclos_nom, GROUP_CONCAT(animal.nom SEPARATOR ', ') AS animaux
          FROM enclos
          LEFT JOIN animal ON enclos.id = animal.enclos_id
          GROUP BY enclos.id";

// Exécution de la requête
$stmt = $pdo->prepare($query);
$stmt->execute();

// Récupération des résultats
$enclos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Préparer les données à retourner
$enclosData = [];
foreach ($enclos as $row) {
    $enclosData[] = [
        "id" => $row['id'],
        "nom" => $row['enclos_nom'],
        "animaux" => array_map('trim', explode(',', $row['animaux']))
    ];
}

// Renvoyer la réponse sous forme de JSON
echo json_encode($enclosData);
?>
