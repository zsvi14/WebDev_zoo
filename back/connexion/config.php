<?php
//a     SUPRIMER
// connexion a la base de donees
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bddzoo";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection at the bdd failed: " . $conn->connect_error);
}
?>
