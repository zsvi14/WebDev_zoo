<?php

class EnclosController {

    // Récupère tous les enclos
    public function getAllEnclos() {
        // Exemple de récupération des enclos depuis une base de données
        return [
            [
                'nom' => 'Enclos 1',
                'animaux' => [
                    ['nom' => 'Lion'],
                    ['nom' => 'Tigre']
                ]
            ],
            [
                'nom' => 'Enclos 2',
                'animaux' => [
                    ['nom' => 'Zèbre'],
                    ['nom' => 'Girafe']
                ]
            ]
        ];
    }

    // Récupère les détails d'un enclos
    public function getEnclosDetails($enclosId) {
        // Exemple de détails pour un enclos
        return [
            'nom' => 'Enclos 1',
            'description' => 'Enclos de grands félins',
            'photos' => [
                ['url' => 'photo1.jpg', 'description' => 'Lion en train de se reposer'],
                ['url' => 'photo2.jpg', 'description' => 'Tigre dans la savane']
            ],
            'animaux' => [
                ['nom' => 'Lion', 'species' => 'Panthera leo'],
                ['nom' => 'Tigre', 'species' => 'Panthera tigris']
            ]
        ];
    }

    // Recherche des enclos en fonction des animaux
    public function searchByAnimal($animal) {
        // Exemple de recherche d'enclos par animal
        return [
            [
                'nom' => 'Enclos 1',
                'animaux' => [
                    ['nom' => 'Lion'],
                    ['nom' => 'Tigre']
                ]
            ]
        ];
    }
}
?>
