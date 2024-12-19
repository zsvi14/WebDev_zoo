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

// Gestion des actions (récupération ou mise à jour)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['get_enclosures'])) {
        // Récupérer les noms uniques des enclos
        $query = "SELECT DISTINCT nom_enclos, MIN(id) as id FROM enclos GROUP BY nom_enclos ORDER BY nom_enclos ASC";
        $result = $conn->query($query);

        $enclosures = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $enclosures[] = ['id' => $row['id'], 'name' => $row['nom_enclos']];
            }
        }

        // Retourner les données sous forme JSON
        header('Content-Type: application/json');
        echo json_encode($enclosures);
        exit;

    } elseif (isset($_GET['enclos_id'], $_GET['new_meal_time'])) {
        // Mettre à jour l'heure de repas dans la base de données
        $enclos_id = intval($_GET['enclos_id']);
        $new_meal_time = $_GET['new_meal_time'];

        // Récupérer le nom de l'enclos basé sur son ID
        $get_name_query = "SELECT nom_enclos FROM enclos WHERE id = ?";
        $stmt = $conn->prepare($get_name_query);
        $stmt->bind_param("i", $enclos_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $nom_enclos = $row['nom_enclos'];

        // Mettez à jour l'heure pour toutes les lignes ayant le même nom
        $update_query = "UPDATE enclos SET h_repas = ? WHERE nom_enclos = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ss", $new_meal_time, $nom_enclos);

        if ($stmt->execute()) {
            echo "L'heure de repas a été mise à jour avec succès.";
        } else {
            echo "Erreur : Échec de la mise à jour de la base de données.";
        }
        exit;
    }
} else {
    echo "Requête non valide.";
}

$conn->close();
