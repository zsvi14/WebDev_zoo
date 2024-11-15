<?php
// Paramètres de connexion à la base de données
$hostname = 'localhost';
$username = 'root';  // Remplacez avec votre nom d'utilisateur MySQL
$password = '';      // Remplacez avec votre mot de passe MySQL
$database = 'bddzoo'; // Le nom de votre base de données

// Connexion à la base de données
$conn = new mysqli($hostname, $username, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Requête SQL pour récupérer la liste des enclos avec les animaux associés
$sql = "SELECT enclos.id, enclos.repos, biomes.nom AS biome, 
                GROUP_CONCAT(animaux.nom SEPARATOR ', ') AS animaux
        FROM enclos
        LEFT JOIN biomes ON enclos.id_biomes = biomes.id
        LEFT JOIN animaux ON enclos.id_animaux = animaux.id
        GROUP BY enclos.id";

// Exécution de la requête
$result = $conn->query($sql);

// Vérifier si des enclos ont été trouvés
if ($result->num_rows > 0) {
    echo "<h1>Liste des Enclos et Animaux</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID Enclos</th><th>Biomes</th><th>Animaux</th><th>Repos</th></tr>";

    // Parcours des résultats et affichage dans un tableau HTML
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['biome'] . "</td>";
        echo "<td>" . $row['animaux'] . "</td>";
        echo "<td>" . ($row['repos'] == 1 ? "Oui" : "Non") . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucun enclos trouvé.";
}

// Fermeture de la connexion
$conn->close();
?>
