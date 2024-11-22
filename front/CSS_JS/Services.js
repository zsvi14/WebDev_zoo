document.addEventListener("DOMContentLoaded", () => {
    // Liste des services et leurs descriptions
    const services = {
        "Paillote": {
            description: `
            <p>La Paillote<br>
                Pour une petite faim ou un grand creux , la “Paillote ” saura vous satisfaire !<br>
                Située au cœur du parc sous une terrasse ombragée, une sélection de produits pour petits et grands : crêpes, frites, steaks hachés, nuggets, sandwiches, salades, glaces, gaufres…
            </p>
            <p>
                Des micros-ondes sont à votre disposition pour faire réchauffer les repas des jeunes enfants !
            </p>
            <p>
                La Paillote est ouverte tous les jours.
            </p>`,
            image: "../../Images/images_services/paillote.jpg",
            coords: [48.8566, 2.3522]
        },
        "Café Nomade": {
            description: "Un café ambulant pour vos envies de boissons chaudes.",
            image: "../../Images/images_services/cafe_nom.jpg",
            coords: [48.8566, 1.3522]
        },
        "Café": {
            description: "Un endroit cosy pour savourer un bon café.",
            image: "../../Images/images_services/cafe.jpg",
            coords: [48.8566, 0.3522]
        },
        "Tente pédagogique": {
            description: "Un espace éducatif pour apprendre en famille.",
            image: "../../Images/images_services/tente_pedagogique.jpg",
            coords: [48.8566, 3.3522]
        },
        "Plateaux des jeux": {
            description: "Des jeux interactifs pour toute la famille.",
            image: "../../Images/images_services/plateau_jeux.jpg",
            coords: [48.8566, 4.3522]
        },
        "Lodge": {
            description: "Un endroit pour se reposer et profiter de la nature.",
            image: "../../Images/images_services/lodge.jpg",
            coords: [48.8566, 5.3522]
        },
        "Le petit train": {
            description: "Un moyen amusant de découvrir le parc.",
            image: "../../Images/images_services/petit_train.jpg",
            coords: [48.8566, 6.3522]
        },
        "Espace pique-nique": {
            description: "Des zones ombragées pour vos repas en plein air.",
            image: "../../Images/images_services/pique_n.jpg",
            coords: [4.8566, 2.3522]
        },
        "Points d'eau": {
            description: "Des endroits pour se rafraîchir et boire de l'eau.",
            coords: [48.8566, 7.3522]
        },
        "Toilettes": {
            description: "Des installations sanitaires pour votre confort.",
            coords: [8.8566, 2.3522]
        },
        "La gare": {
            description: "Le point de départ du petit train.",
            image: "../../Images/gare.jpg",
            coords: [48.8566, 2.3522]
        }
    };

    // Initialisation de la carte
    const map = L.map('map', {
        center: [48.8566, 2.3522], // Centre initial de la carte
        zoom: 15
    });

    // Ajouter une couche de tuiles à la carte
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    let activeCircle = null; // Variable pour stocker le cercle actif

    // Sélectionner les éléments .services
    const serviceElements = document.querySelectorAll(".services");
    console.log("Nombre de services détectés :", serviceElements.length);

    // Vérifier si aucun service n'est détecté
    if (serviceElements.length === 0) {
        console.error("Aucun élément .services détecté. Vérifiez votre HTML.");
        return;
    }

    // Conteneur pour afficher les descriptions
    const descriptionContainer = document.getElementById("description-container");

    // Ajouter les événements de clic
    serviceElements.forEach(service => {
        service.addEventListener("click", () => {
            const serviceName = service.textContent.trim();
            const selectedService = services[serviceName];

            if (selectedService) {
                // Mettre à jour la description
                const { description, image, coords } = selectedService;
                descriptionContainer.innerHTML = `
                    <h3>${serviceName}</h3>
                    <p>${description || "Description non disponible."}</p>
                    ${image ? `<img src="${image}" alt="${serviceName}" style="max-width: 100%; height: auto;">` : ""}
                `;

                // Supprimer l'ancien cercle, s'il existe
                if (activeCircle) {
                    map.removeLayer(activeCircle);
                }

                if (coords) {
                    // Ajouter un cercle rouge sur la carte
                    activeCircle = L.circle(coords, {
                        color: 'red',
                        fillColor: '#f03',
                        fillOpacity: 0.5,
                        radius: 50 // Rayon du cercle en mètres
                    }).addTo(map);

                    // Centrer la carte sur les coordonnées
                    map.setView(coords, 15);
                } else {
                    console.warn(`Pas de coordonnées pour le service : ${serviceName}`);
                }
            }
        });
    });
});
