<?php
// traitement de la connexion
//ne pas faire de : session car je fais du : localStorage pour svg les infos des personnes
session_start();
include('config.php');

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM userinfo WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo json_encode(["success" => true, "user" => $user]);
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

 