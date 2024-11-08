<?php

header("Content-Type: application/json");
include_once '../controllers/enclosController.php';

$controller = new EnclosController();
$searchQuery = $_GET['search'] ?? null;
$enclosId = $_GET['id'] ?? null;

if ($searchQuery) {
    echo json_encode($controller->searchByAnimal($searchQuery));
} elseif ($enclosId) {
    echo json_encode($controller->getEnclosDetails($enclosId));
} else {
    echo json_encode($controller->getAllEnclos());
}
?>
