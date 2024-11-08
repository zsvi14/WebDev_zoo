<?php

class HorairesRepasController {

    // Ajouter un horaire de repas à un enclos
    public function addHoraireRepas($enclosId, $horaire) {
        // Enregistrement de l'horaire dans la base de données
        return ["message" => "Horaire de repas ajouté avec succès pour l'enclos $enclosId"];
    }
}
?>
