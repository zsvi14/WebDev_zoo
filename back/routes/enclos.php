<?php
include_once '/back/controllers/enclosControllers.php';

$enclosController = new EnclosController();

// Afficher tous les enclos
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['id'])) {
    echo json_encode($enclosController->getAllEnclos());
}

// Afficher un enclos spécifique
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    echo json_encode($enclosController->getEnclosDetails($_GET['id']));
}
?>
