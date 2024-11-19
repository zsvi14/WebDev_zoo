<?php
include_once 'database.php';

class EnclosController {
    public function getAllEnclos() {
        global $db;
        $sql = "SELECT e.id, e.repos, a.nom AS animal, b.nom AS biome FROM enclos e
                JOIN animaux a ON e.id_animaux = a.id
                JOIN biomes b ON e.id_biomes = b.id";
        $result = $db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEnclosDetails($id) {
        global $db;
        $sql = "SELECT e.id, e.repos, a.nom AS animal, b.nom AS biome, b.couleur 
                FROM enclos e
                JOIN animaux a ON e.id_animaux = a.id
                JOIN biomes b ON e.id_biomes = b.id
                WHERE e.id = $id";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }
}
?>
