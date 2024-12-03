<?php
// traitement de la connexion
header("Content-Type: application/json");

// Inclure la configuration de la base de données
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];

    // Requête pour récupérer l'utilisateur
    $sql = "SELECT * FROM admin_info WHERE identifiant = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $identifiant);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Vérification du mot de passe
        if (password_verify($password, $user['password_hash'])) {
            // Connexion réussie
            echo json_encode(["success" => true, "message" => "Connexion réussie."]);
        } else {
            // Mot de passe incorrect
            echo json_encode(["success" => false, "message" => "Mot de passe incorrect."]);
        }
    } else {
        // Identifiant non trouvé
        echo json_encode(["success" => false, "message" => "Identifiant non trouvé."]);
    }
} else {
    // Requête non valide
    echo json_encode(["success" => false, "message" => "Requête non valide."]);
}
?>
