<?php
$servername = "localhost";
$username = "root"; // Votre utilisateur
$password = ""; // Votre mot de passe
$dbname = "bddzoo"; // Le nom de votre base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Insertion des enclos
$enclos_data = [
    ["nom" => "Enclos des Réptiles"],
    ["nom" => "Enclos Volant"],
];

foreach ($enclos_data as $enclos) {
    $sql_enclos = "INSERT INTO enclos (nom) VALUES ('" . $enclos['nom'] . "')";
    if ($conn->query($sql_enclos) !== TRUE) {
        echo "Erreur: " . $conn->error;
    }
}

// Insertion des animaux
$animaux_data = [
    ["nom" => "Python", "enclos" => "Enclos des Réptiles"],
    ["nom" => "Tortue", "enclos" => "Enclos des Réptiles"],
];

foreach ($animaux_data as $animal) {
    // Récupérer l'id de l'enclos
    $sql_enclos_id = "SELECT id FROM enclos WHERE nom = '" . $animal['enclos'] . "'";
    $result = $conn->query($sql_enclos_id);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $enclos_id = $row['id'];

        // Insertion de l'animal
        $sql_animal = "INSERT INTO animaux (nom, enclos_id) VALUES ('" . $animal['nom'] . "', '$enclos_id')";
        if ($conn->query($sql_animal) !== TRUE) {
            echo "Erreur: " . $conn->error;
        }
    }
}

echo "Les enclos et animaux ont été insérés avec succès.";
$conn->close();
?>
