<?php
//info de l utilisateur connecté
session_start();

header("Content-Type: application/json");

if (isset($_SESSION['user_id'])) {
    echo json_encode([
        "success" => true,
        "username" => $_SESSION['username'],
        "email" => $_SESSION['email']
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Non connecté."
    ]);
}
?>
