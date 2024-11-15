<?php
$servername = "localhost";
$username = "root"; // Votre utilisateur MySQL
$password = ""; // Votre mot de passe MySQL
$dbname = "bddzoo"; // Le nom de votre base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Insertion des enclos
$enclos_data = [
    ["nom" => "Enclos des Réptiles", "id_biomes" => 1], // Assurez-vous que le biomes existe
    ["nom" => "Enclos Volant", "id_biomes" => 2], // Assurez-vous que le biomes existe
];

foreach ($enclos_data as $enclos) {
    $sql_enclos = "INSERT INTO enclos (nom, id_biomes) VALUES ('" . $enclos['nom'] . "', " . $enclos['id_biomes'] . ")";
    if ($conn->query($sql_enclos) !== TRUE) {
        echo "Erreur lors de l'insertion de l'enclos: " . $conn->error;
    }
}

// Insertion des animaux
$animaux_data = [
    ["nom" => "Python", "nombre" => 2], // Exemple d'animal
    ["nom" => "Tortue", "nombre" => 3], // Exemple d'animal
];

foreach ($animaux_data as $animal) {
    $sql_animal = "INSERT INTO animaux (nom, nombre) VALUES ('" . $animal['nom'] . "', " . $animal['nombre'] . ")";
    if ($conn->query($sql_animal) !== TRUE) {
        echo "Erreur lors de l'insertion de l'animal: " . $conn->error;
    }
}

// Insertion des avis sur les enclos (exemple)
$review_data = [
    ["user_id" => 1, "enclosure_id" => 1, "rating" => 5, "review" => "Très bien !"], // Exemple d'avis
    ["user_id" => 2, "enclosure_id" => 2, "rating" => 4, "review" => "Bien, mais à améliorer"], // Exemple d'avis
];

foreach ($review_data as $review) {
    $sql_review = "INSERT INTO enclosure_reviews (user_id, enclosure_id, rating, review) 
                   VALUES (" . $review['user_id'] . ", " . $review['enclosure_id'] . ", " . $review['rating'] . ", '" . $review['review'] . "')";
    if ($conn->query($sql_review) !== TRUE) {
        echo "Erreur lors de l'insertion de l'avis: " . $conn->error;
    }
}

echo "Les enclos, animaux et avis ont été insérés avec succès.";
$conn->close();
?>
