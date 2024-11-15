<?php
// Tableau des enclos et des animaux
$enclos = [
    [
        "nom" => "Enclos des Réptiles",
        "animaux" => [
            ["nom" => "Python"],
            ["nom" => "Tortue"],
            ["nom" => "Iguane"]
        ]
    ],
    [
        "nom" => "Enclos Volant",
        "animaux" => [
            ["nom" => "Ara Perroquet"],
            ["nom" => "Grand Hocco"]
        ]
    ],
    [
        "nom" => "Enclos des Panthères",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Trois Continents",
        "animaux" => [
            ["nom" => "Rhinocéros"],
            ["nom" => "Oryx Beisa"],
            ["nom" => "Gnou"]
        ]
    ],
    [
        "nom" => "Enclos des Surricates",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Fennec",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Acrobates de la Jungle",
        "animaux" => [
            ["nom" => "Coatis"],
            ["nom" => "Saimiris"]
        ]
    ],
    [
        "nom" => "Enclos des Tapirs",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Guépards",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Grands Coureurs",
        "animaux" => [
            ["nom" => "Autruches"],
            ["nom" => "Gazelles"]
        ]
    ],
    [
        "nom" => "Enclos des Casoars",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Crocodiles Nains",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Lions",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Hippopotames",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Zèbres",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Hyenes",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Loups à Crinières",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Têtes en l'Air",
        "animaux" => [
            ["nom" => "Giafes"],
            ["nom" => "Grivets Cercopithèques"]
        ]
    ],
    [
        "nom" => "Enclos des Titans de la nature",
        "animaux" => [
            ["nom" => "Eléphants"],
            ["nom" => "Varan de Komodo"]
        ]
    ],
    [
        "nom" => "Enclos des Panda Roux",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Lémuriens",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Chèvres Naines",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Tortues",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Mouflons",
        "animaux" => []
    ],
    [
        "nom" => "Enclos Ruisseau des Curieux",
        "animaux" => [
            ["nom" => "Binturong"],
            ["nom" => "Loutres"]
        ]
    ],
    [
        "nom" => "Enclos des Macaques Crabiers",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Cerfs",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Vautours",
        "animaux" => []
    ],
    [
        "nom" => "Enclos Plaine des Elégants",
        "animaux" => [
            ["nom" => "Antilopes"],
            ["nom" => "Daims"],
            ["nom" => "Nilgauts"]
        ]
    ],
    [
        "nom" => "Enclos des Loups d'Europe",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Lynx",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Servals",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Chiens des Buissons",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Tigres",
        "animaux" => []
    ],
    [
        "nom" => "Enclos du Désert Provençal",
        "animaux" => [
            ["nom" => "Dromadaires"],
            ["nom" => "Anes de Provence"]
        ]
    ],
    [
        "nom" => "Enclos des Bisons",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Porc-Epic",
        "animaux" => []
    ],
    [
        "nom" => "Enclos des Pécaris",
        "animaux" => []
    ],
    [
        "nom" => "Enclos la Terre des Australes",
        "animaux" => [
            ["nom" => "Emeu"],
            ["nom" => "Wallaby"]
        ]
    ],
    [
        "nom" => "Enclos la Savane Tropical",
        "animaux" => [
            ["nom" => "Flamant Roses"],
            ["nom" => "Nandou"],
            ["nom" => "Tamanoirs"]
        ]
    ],
    [
        "nom" => "Enclos Lagune des Explorateurs",
        "animaux" => [
            ["nom" => "Tortues"],
            ["nom" => "Ibis"]
        ]
    ],
    [
        "nom" => "Enclos des Longues Plumes",
        "animaux" => [
            ["nom" => "Cigognes"],
            ["nom" => "Marabouts"]
        ]
    ],
    [
        "nom" => "Enclos des Cornes et des Sabots",
        "animaux" => [
            ["nom" => "Oryx Algazelle"],
            ["nom" => "Watusi"],
            ["nom" => "Anes de Somalie"]
        ]
    ],
    [
        "nom" => "Enclos le Refuge des Montagnes",
        "animaux" => [
            ["nom" => "Yack"],
            ["nom" => "Moutons Noir"]
        ]
    ]
];

// Envoi des données sous forme JSON
header('Content-Type: application/json');
echo json_encode($enclos);
?>