<?php
//deconnexion de la session
session_start();
session_destroy();
header("Content-Type: application/json");
echo json_encode(["success" => true, "message" => "Déconnexion réussie."]);
?>
