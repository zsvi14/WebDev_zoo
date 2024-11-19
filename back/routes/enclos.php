<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Récupère la liste des enclos
    $query = $pdo->prepare("
        SELECT enclos.id AS enclos_id, enclos.repos AS en_travaux,
               animaux.nom AS nom_animal, animaux.nombre AS nombre_animaux,
               biomes.nom AS nom_biome, biomes.couleur AS couleur_biome
        FROM enclos
        LEFT JOIN enclos_animaux ON enclos.id = enclos_animaux.enclos_id
        LEFT JOIN animaux ON enclos_animaux.animaux_id = animaux.id
        LEFT JOIN biomes ON enclos.id_biomes = biomes.id
    ");
    $query->execute();
    $enclos = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($enclos);
}
?>
