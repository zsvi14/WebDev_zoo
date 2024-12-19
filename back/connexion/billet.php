<?php
//billeterie 
// Connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bddzoo';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$email = $_POST['mail'];
// Générer le billet
Nom : $nom
Email : $mail

envoyerEmail($mail, $billet);

echo "Votre billet a été acheté et envoyé à votre adresse email.";
?>