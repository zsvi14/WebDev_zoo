<?php
header('Content-Type: application/json');
include_once '../db/database.php';


// Requête SQL pour récupérer les informations des enclos et des animaux associés
$query = "SELECT e.nom AS enclos_nom, a.nom AS animal
          FROM enclos e
          LEFT JOIN enclos_animaux ea ON e.id = ea.id_enclos
          LEFT JOIN animaux a ON ea.id_animal = a.id";

// Exécuter la requête
$result = $conn->query($query);

// Vérifier si des résultats sont retournés
if ($result->num_rows > 0) {
    // Afficher les résultats
    while($row = $result->fetch_assoc()) {
        // Vérifier si un animal est associé à l'enclos
        if ($row['animal']) {
            echo "Enclos : " . $row['enclos_nom'] . " - Animal : " . $row['animal'] . "<br>";
        } else {
            echo "Enclos : " . $row['enclos_nom'] . " - Aucun animal associé<br>";
        }
    }
} else {
    echo "Aucun enclos trouvé";
}

// Fermer la connexion
$conn->close();
?>
