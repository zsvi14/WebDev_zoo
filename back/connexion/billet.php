<?php
//billeterie 
// Récupérer les données du formulaire
$nom = $_POST['nom'];
$email = $_POST['mail'];
$billetType = $_POST['billetType'];
// Générer le billet (vous pouvez personnaliser ce format)
$billet = ""
Nom : $nom
Email : $mail

// Envoyer un email (à remplacer par votre fonction d'envoi d'email)
envoyerEmail($mail, $billet);

// Afficher un message de confirmation
echo "Votre billet a été acheté et envoyé à votre adresse email.";
?>