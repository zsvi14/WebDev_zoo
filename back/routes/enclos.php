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
<?php
// Requête pour récupérer les enclos avec la couleur des biomes
$query = "SELECT e.id, e.nom_enclos, b.nom AS biome, b.couleur, a.nom AS animal 
          FROM enclos e
          JOIN biomes b ON e.id_biomes = b.id
          JOIN animaux a ON e.id_animaux = a.id";

// Exécution de la requête
$stmt = $pdo->query($query);

// Récupération des résultats
$enclosList = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Regrouper les animaux par enclos
$groupedEnclos = [];
foreach ($enclosList as $enclos) {
    // Si l'enclos n'existe pas encore dans le tableau, on l'initialise
    if (!isset($groupedEnclos[$enclos['nom_enclos']])) {
        $groupedEnclos[$enclos['nom_enclos']] = [
            'nom_enclos' => $enclos['nom_enclos'],
            'biome' => $enclos['biome'],
            'couleur' => $enclos['couleur'],
            'animaux' => []
        ];
    }
    
    // Ajouter l'animal à la liste des animaux de l'enclos
    $groupedEnclos[$enclos['nom_enclos']]['animaux'][] = $enclos['animal'];
}

// Convertir le tableau en JSON et l'envoyer
header('Content-Type: application/json');
echo json_encode(array_values($groupedEnclos));
?>


?>

