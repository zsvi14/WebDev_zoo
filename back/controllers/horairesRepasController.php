<?php
include_once 'database.php';

class HorairesRepasController {
    public function addRepas($id_enclos, $horaire) {
        global $db;
        $sql = "INSERT INTO horaires_repas (id_enclos, horaire) VALUES ($id_enclos, '$horaire')";
        if($db->query($sql) === TRUE) {
            echo "Horaire ajouté avec succès";
        } else {
            echo "Erreur : " . $db->error;
        }
    }
}
?>
