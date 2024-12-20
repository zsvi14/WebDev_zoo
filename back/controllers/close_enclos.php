<?php
// Configuration de la base de données
$host = 'localhost';
$dbname = 'bddzoo';
$user = 'root';
$password = '';
echo "mon fichier php";

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Traitement du formulaire pour fermer un enclos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enclos_id'])) {
    $enclos_id = intval($_POST['enclos_id']);

    // Vérification si l'enclos existe et est ouvert
    $check_query = "SELECT * FROM d_enclos WHERE id = $enclos_id AND repos = 0";
    $check_result = $conn->query($check_query);

    if ($check_result && $check_result->num_rows > 0) {
        // Mise à jour pour fermer l'enclos
        $update_query = "UPDATE d_enclos SET repos = 1 WHERE id = $enclos_id";
        if ($conn->query($update_query) === TRUE) {
            echo "L'enclos a été fermé avec succès.<br>";
            header("Location: /WebDev_zoo/front/html/Pages/fermeture_enclos.html");
        } else {
            echo "Erreur lors de la fermeture de l'enclos : " . $conn->error . "<br>";
            header("Location: /WebDev_zoo/front/html/Pages/fermeture_enclos.html");
        }
    } else {
        echo "L'enclos spécifié est introuvable ou déjà fermé.<br>";
        header("Location: /WebDev_zoo/front/html/Pages/fermeture_enclos.html");
    }
}

// Traitement du formulaire pour ouvrir un enclos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['open_enclos_id'])) {
    $open_enclos_id = intval($_POST['open_enclos_id']);

    // Vérification si l'enclos existe et est fermé
    $check_open_query = "SELECT * FROM d_enclos WHERE id = $open_enclos_id AND repos = 1";
    $check_open_result = $conn->query($check_open_query);

    if ($check_open_result && $check_open_result->num_rows > 0) {
        // Mise à jour pour ouvrir l'enclos
        $update_open_query = "UPDATE d_enclos SET repos = 0 WHERE id = $open_enclos_id";
        if ($conn->query($update_open_query) === TRUE) {
            echo "L'enclos a été ouvert avec succès.<br>";
            header("Location: /WebDev_zoo/front/html/Pages/fermeture_enclos.html");
        } else {
            echo "Erreur lors de l'ouverture de l'enclos : " . $conn->error . "<br>";
            header("Location: /WebDev_zoo/front/html/Pages/fermeture_enclos.html");
        }
    } else {
        echo "L'enclos spécifié est introuvable ou déjà ouvert.<br>";
        header("Location: /WebDev_zoo/front/html/Pages/fermeture_enclos.html");
    }
}

// Récupération des enclos ouverts pour le formulaire
$all_enclosures_query = "SELECT id, enclos FROM d_enclos WHERE repos = 0";
$all_enclosures_result = $conn->query($all_enclosures_query);

$options_html = "";
if ($all_enclosures_result) {
    if ($all_enclosures_result->num_rows > 0) {
        while ($row = $all_enclosures_result->fetch_assoc()) {
            $options_html .= "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['enclos']) . "</option>";
        }
    } else {
        $options_html .= "<option value='' disabled>Aucun enclos disponible</option>";
    }
} else {
    die("Erreur lors de la récupération des enclos ouverts : " . $conn->error);
}

// Récupération des enclos fermés pour le formulaire
$closed_enclosures_form_query = "SELECT id, enclos FROM d_enclos WHERE repos = 1";
$closed_enclosures_form_result = $conn->query($closed_enclosures_form_query);

$options_open_html = "";
if ($closed_enclosures_form_result) {
    if ($closed_enclosures_form_result->num_rows > 0) {
        while ($row = $closed_enclosures_form_result->fetch_assoc()) {
            $options_open_html .= "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['enclos']) . "</option>";
        }
    } else {
        $options_open_html .= "<option value='' disabled>Aucun enclos fermé disponible</option>";
    }
} else {
    die("Erreur lors de la récupération des enclos fermés pour ouverture : " . $conn->error);
}

// Récupération des enclos fermés pour l'affichage
$closed_enclosures_query = "SELECT id, enclos FROM d_enclos WHERE repos = 1";
$closed_enclosures_result = $conn->query($closed_enclosures_query);

$closed_html = "";
if ($closed_enclosures_result) {
    if ($closed_enclosures_result->num_rows > 0) {
        while ($row = $closed_enclosures_result->fetch_assoc()) {
            $closed_html .= "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['enclos']) . "</option>";
        }
    } else {
        $closed_html .= "<option value='' disabled>Aucun enclos fermé disponible</option>";
    }
} else {
    die("Erreur lors de la récupération des enclos fermés : " . $conn->error);
}

// Afficher les données générées pour vérification (débogage)
echo "Options générées : <br>";
echo htmlspecialchars($options_html) . "<br>";

echo "Liste des enclos fermés générée : <br>";
echo htmlspecialchars($closed_html) . "<br>";

// Injection des données dans le fichier HTML
$file_path = '../../front/HTML/Pages/fermeture_enclos.html';

// Mise à jour de la balise <select>
$updated_html = preg_replace(
    '/<select name="enclos_id" id="enclos_id" required>.*?<\/select>/s',
    '<select name="enclos_id" id="enclos_id" required>' . $options_html . '</select>',
    file_get_contents($file_path)
);
// Mise à jour de la balise <select> pour l'ouverture des enclos
$updated_html = preg_replace(
    '/<select name="open_enclos_id" id="open_enclos_id" required>.*?<\/select>/s',
    '<select name="open_enclos_id" id="open_enclos_id" required>' . $options_open_html . '</select>',
    $updated_html
);

// Mise à jour de la liste des enclos fermés
$updated_html = preg_replace(
    '/<div id="closed-enclosures">.*?<\/div>/s',
    '<div id="closed-enclosures">' . $closed_html . '</div>',
    $updated_html
);


// Écriture dans le fichier
if (file_put_contents($file_path, $updated_html) === false) {
    die("Erreur : Échec de l'écriture dans le fichier HTML.");
} else {
    echo "Fichier HTML mis à jour avec succès.<br>";
}

// Fermer la connexion
$conn->close();
?>
