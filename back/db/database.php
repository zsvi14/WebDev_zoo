<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dataBaseName = 'liste_services';
// Connexion à la base de données
$db = new mysqli($servername, $username, $password, $dataBaseName);
// check connection
if($db->connect_error) {
// Si erreur de connexion, on boucle le reste de la page
die("connection echouée");
}

 ?>
