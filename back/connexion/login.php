<?php
// traitement de la connexion
session_start();
include('config.php');

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT id, password, isAdmin FROM userinfo WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['isAdmin'] = $user['isAdmin'];
            echo json_encode(["success" => true, "message" => "Connexion réussie."]);
        } else {
            echo json_encode(["error" => false, "message" => "Mot de passe incorrect."]);
        }
    } else {
        echo json_encode(["error" => false, "message" => "Utilisateur non trouvé."]);
    }
} else {
    echo json_encode(["error" => false, "message" => "fais du post"]);
}
?>

