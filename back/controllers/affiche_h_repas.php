<?php
// Connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bddzoo';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Récupérer les horaires de tous les enclos
$query = "SELECT nom_enclos, h_repas FROM enclos ORDER BY nom_enclos ASC";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>" . htmlspecialchars($row['nom_enclos']) . "</strong>: " . htmlspecialchars($row['h_repas']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Aucun horaire de repas disponible.</p>";
}

$conn->close();
?>
