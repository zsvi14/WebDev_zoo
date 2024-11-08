<?php

header("Content-Type: application/json");
include_once '../controllers/horairesRepasController.php';

$controller = new HorairesRepasController();

$action = $_GET['action'] ?? null;
$enclosId = $_GET['enclos_id'] ?? null;
$horaire = $_GET['horaire'] ?? null;

if ($action === 'add' && $enclosId && $horaire) {
    echo json_encode($controller->addHoraireRepas($enclosId, $horaire));
} else {
    echo json_encode(["message" => "Action non reconnue"]);
}
?>
