<!-- connexion a la base de donees -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
