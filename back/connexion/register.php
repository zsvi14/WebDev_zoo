<?php
//traitement de l inscription
include('config.php');

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations envoyées par le formulaire
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hacher le mot de passe avant de l'enregistrer
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    // Insérer les données dans la base de données
    $sql = "INSERT INTO userinfo (nom, mail, password, isAdmin) VALUES (?, ?, ?, 'visitor')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed_password);
    
    // Vérifier si l'insertion a réussi
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Inscription réussie."]);
    } else {
        echo json_encode(["error" => false, "message" => "Erreur lors de l'inscription."]);
    }
}
?>


