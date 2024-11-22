document.addEventListener("DOMContentLoaded", () => {
    // Liste des services et leurs descriptions
    const services = {
        "Paillote": {
            description: `
            <p>La Paillote
                Pour une petite faim ou un grand creux , la “Paillote ” saura vous satisfaire !
                Située au cœur du parc sous une terrasse ombragée, une sélection de produits pour petits et grands : crêpes, frites, steaks hachés, nuggets, sandwiches, salades, glaces, gaufres…

                Des micros-ondes sont à votre disposition pour faire réchauffer les repas des jeunes enfants !

                La Paillote est ouverte tous les jours."</p>` ,

            image: "../../Images/images_services/paillote.jpg"
        },
        "Café Nomade": {
            description: "Un café ambulant pour vos envies de boissons chaudes.",
            image: "../../Images/images_services/cafe_nom.jpg"
        },
        "Café": {
            description: "Un endroit cosy pour savourer un bon café.",
            image: "../../Images/images_services/cafe.jpg"
        },
        "Tente pédagogique": {
            description: "Un espace éducatif pour apprendre en famille.",
            image: "../../Images/images_services/tente_pedagogique.jpg"
        },
        "Plateaux des jeux": {
            description: "Des jeux interactifs pour toute la famille.",
            image: "../../Images/images_services/plateau_jeux.jpg"
        },
        "Lodge": {
            description: "Un endroit pour se reposer et profiter de la nature.",
            image: "../../Images/images_services/lodge.jpg"
        },
        "Le petit train": {
            description: "Un moyen amusant de découvrir le parc.",
            image: "../../Images/images_services/petit_train.jpg"
        },
        "Espace pique-nique": {
            description: "Des zones ombragées pour vos repas en plein air.",
            image: "../../Images/images_services/pique_n.jpg"
        },
        "Points d'eau": {
            description: "Des endroits pour se rafraîchir et boire de l'eau.",
            image: "../../Images/points_eau.jpg"
        },
        "Toilettes": {
            description: "Des installations sanitaires pour votre confort.",
            image: "../../Images/toilettes.jpg"
        },
        "La gare": {
            description: "Le point de départ du petit train.",
            image: "../../Images/gare.jpg"
        }
    };

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

    // Ajouter les événements
    serviceElements.forEach(service => {
        service.addEventListener("click", () => {
            const serviceName = service.textContent.trim();
            console.log("Survol détecté :", serviceName);
            if (services[serviceName]) {
                const { description, image } = services[serviceName];
                descriptionContainer.innerHTML = `
                    <h3>${serviceName}</h3>
                    <p>${description}</p>
                    <img src="${image}" alt="${serviceName}">
                `;
                descriptionContainer.style.display = "block"; // Afficher le conteneur
            }
        });

    });
});
