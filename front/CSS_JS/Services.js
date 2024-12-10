document.addEventListener("DOMContentLoaded", () => {
    // Liste des services et leurs descriptions
    const services = {
        "Paillote": {
            description: `
            <p>La Paillote<br>
                Pour une petite faim ou un grand creux, la “Paillote” saura vous satisfaire !<br>
                Située au cœur du parc sous une terrasse ombragée, une sélection de produits pour petits et grands : crêpes, frites, steaks hachés, nuggets, sandwiches, salades, glaces, gaufres…
            </p>
            <p>
                Des micros-ondes sont à votre disposition pour faire réchauffer les repas des jeunes enfants !</p>
            <p>La Paillote est ouverte tous les jours.</p>`,
            image: "../../Images/images_services/paillote.jpg",
            coords: [30, 20] // Coordonnées relatives dans l'image
        },
        "Café Nomade": {
            description: "Une caravane pour vos envies de boissons chaudes.",
            image: "../../Images/images_services/cafe_nom.jpg",
            coords: [30, 25]
        },
        "Café": {
            description: "Un endroit cosy pour savourer un bon café.",
            image: "../../Images/images_services/cafe.jpg",
            coords: [30, 30]
        },
        "Lodge": {
            description: "Un endroit pour se reposer et profiter de la nature. Le lodge est idéal pour une pause relaxante dans un cadre naturel et paisible.",
            image: "../../Images/images_services/lodge.jpg",
            coords: [30, 10]
        },
        "Tente pédagogique": {
            description: "Un espace éducatif pour apprendre en famille. Des ateliers ludiques et interactifs sur la faune et la flore du parc.",
            image: "../../Images/images_services/tente_pedagogique.jpg",
            coords: [30, 23]
        },
        // Vous pouvez ajouter d'autres services ici...
    };

    const mapContainer = document.getElementById("map");
    const serviceElements = document.querySelectorAll(".services");
    const descriptionContainer = document.getElementById("description-container");

    // Afficher la description par défaut lorsqu'on arrive sur la page
    descriptionContainer.innerHTML = `
        <h3>Bienvenue au Parc</h3>
        <p>Découvrez les services disponibles dans notre parc ! Cliquez sur un service pour obtenir plus d'informations.</p>
    `;
    descriptionContainer.style.display = "block";

    // Fonction pour afficher un point rouge dynamique
    function displayPoint(serviceName) {
        const selectedService = services[serviceName];

        if (selectedService && selectedService.coords) {
            // Supprimer les cercles existants
            const existingCircles = document.querySelectorAll(".circle");
            existingCircles.forEach(circle => circle.remove());

            // Obtenir les dimensions actuelles de la carte
            const mapWidth = mapContainer.offsetWidth;
            const mapHeight = mapContainer.offsetHeight;

            // Convertir les coordonnées en pixels dynamiquement
            const [xPercent, yPercent] = selectedService.coords;
            const xPos = (xPercent / 100) * mapWidth;
            const yPos = (yPercent / 100) * mapHeight;

            // Créer le cercle
            const circle = document.createElement("div");
            circle.className = "circle";
            circle.style.left = `${xPos}px`;
            circle.style.top = `${yPos}px`;
            circle.style.position = "absolute"; // Dynamique, lié à la carte
            circle.setAttribute("aria-label", serviceName);

            // Ajouter le cercle à la carte
            mapContainer.appendChild(circle);
        }
    }

    // Gestion des clics sur les services
    serviceElements.forEach(service => {
        service.addEventListener("click", () => {
            const serviceName = service.textContent.trim();
            const selectedService = services[serviceName];

            if (selectedService) {
                // Afficher la description
                descriptionContainer.innerHTML = `
                    <h3>${serviceName}</h3>
                    <p>${selectedService.description || "Description non disponible."}</p>
                    ${selectedService.image ? `<img src="${selectedService.image}" alt="${serviceName}" style="max-width: 100%; height: auto;">` : ""}
                `;

                // Afficher le point rouge pour ce service
                displayPoint(serviceName);
            } else {
                descriptionContainer.innerHTML = `<p>Description non disponible pour ce service.</p>`;
            }
        });
    });

    // Recalculer la position du point rouge visible lors du redimensionnement
    window.addEventListener("resize", () => {
        const visibleCircle = document.querySelector(".circle"); // Cercle visible
        if (visibleCircle) {
            const serviceName = visibleCircle.getAttribute("aria-label");
            displayPoint(serviceName); // Recalculer et repositionner le cercle
        }
    });
});
