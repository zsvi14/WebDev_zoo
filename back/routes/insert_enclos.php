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
    ["id_biomes" => 1], // Exemple d'ID de biome
    ["id_biomes" => 2], // Exemple d'ID de biome
];

foreach ($enclos_data as $enclos) {
    $sql_enclos = "INSERT INTO enclos (id_biomes) VALUES ('" . $enclos['id_biomes'] . "')";
    if ($conn->query($sql_enclos) !== TRUE) {
        echo "Erreur: " . $conn->error;
    }
}

// Insertion des animaux
$animaux_data = [
    ["nom" => "Python", "id_enclos" => 1], // ID de l'enclos (assurez-vous que l'ID existe)
    ["nom" => "Tortue", "id_enclos" => 1], // ID de l'enclos (assurez-vous que l'ID existe)
];

foreach ($animaux_data as $animal) {
    // Insérer un animal avec son ID d'enclos
    $sql_animal = "INSERT INTO animaux (nom, id_enclos) VALUES ('" . $animal['nom'] . "', '" . $animal['id_enclos'] . "')";
    if ($conn->query($sql_animal) !== TRUE) {
        echo "Erreur: " . $conn->error;
    }
}

echo "Les enclos et animaux ont été insérés avec succès.";
$conn->close();
?>

