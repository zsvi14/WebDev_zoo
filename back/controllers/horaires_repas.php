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

// Vérifiez les données envoyées par le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['enclos_id'], $_GET['new_meal_time'])) {
    $enclos_id = intval($_GET['enclos_id']);
    $new_meal_time = $_GET['new_meal_time'];

    // Mettez à jour l'heure de repas dans la base de données
    $query = "UPDATE enclos SET h_repas = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $new_meal_time, $enclos_id);

    if ($stmt->execute()) {
        // Mettez à jour le fichier HTML
        $file_path = '../../front/HTML/Pages/heure_repas.html';
        $meal_time_html = "<h3>Heure de repas</h3><p>L'heure de repas de l'enclos est : <span id='meal-time'>" . htmlspecialchars($new_meal_time) . "</span></p>";

        $updated_html = preg_replace(
            '/<section id="meal-time-section">.*?<\/section>/s',
            '<section id="meal-time-section">' . $meal_time_html . '</section>',
            file_get_contents($file_path)
        );

        if (file_put_contents($file_path, $updated_html) !== false) {
            // Redirigez vers la page HTML
            header("Location: /WebDev_zoo/front/html/Pages/heure_repas.html");
            exit;
        } else {
            echo "Erreur : Échec de l'écriture dans le fichier HTML.";
        }
    } else {
        echo "Erreur : Échec de la mise à jour de la base de données.";
    }
} else {
    echo "Données manquantes ou méthode incorrecte.";
}

$conn->close();
