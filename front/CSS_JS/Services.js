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
            coords: [800, 400] // Coordonnées relatives dans l'image
        },
        "Café Nomade": {
            description: "Une caravane pour vos envies de boissons chaudes.",
            image: "../../Images/images_services/cafe_nom.jpg",
            coords: [600, 300]
        },
        "Café": {
            description: "Un endroit cosy pour savourer un bon café.",
            image: "../../Images/images_services/cafe.jpg",
            coords: [400, 200]
        },
        "Lodge": {
            description: "Un endroit pour se reposer et profiter de la nature. Le lodge est idéal pour une pause relaxante dans un cadre naturel et paisible.",
            image: "../../Images/images_services/lodge.jpg",
            coords: [400, 200]
        },
        "Tente pédagogique": {
            description: "Un espace éducatif pour apprendre en famille. Des ateliers ludiques et interactifs sur la faune et la flore du parc.",
            image: "../../Images/images_services/tente_pedagogique.jpg",
            coords: [400, 200]
        },
        "Plateaux des jeux": {
            description: "Des jeux interactifs pour toute la famille. Zone dédiée aux enfants avec des jeux éducatifs et des espaces de détente.",
            image: "../../Images/images_services/plateau_jeux.jpg",
            coords: [400, 200]
        },
        "Le petit train": {
            description: "Un moyen amusant de découvrir le parc. Profitez d'un tour du parc en petit train pour explorer toute la beauté de la nature environnante.",
            image: "../../Images/images_services/petit_train.jpg",
            coords: [400, 200]
        },
        "Espace pique-nique": {
            description: "Une zone ombragée pour vos repas en plein air. Parfait pour une pause déjeuner en famille ou entre amis dans un cadre naturel.",
            image: "../../Images/images_services/pique_n.jpg",
            coords: [400, 200]
        },
        "Points d'eau": {
            description: "Des endroits pour se rafraîchir et boire de l'eau. Restez hydraté pendant votre visite en profitant de nos points d'eau disséminés à travers le parc.",
            image: "../../Images/images_services/.jpg",  // Image manquante
            coords: [400, 200]
        },
        "Toilettes": {
            description: "Des toilettes sont disponibles dans plusieurs zones du parc.",
            image: "../../Images/images_services/.jpg",  // Image manquante
            coords: [400, 200]
        },
        "La gare": {
            description: "Gare.",
            image: "../../Images/images_services/.jpg",  // Image manquante
            coords: [400, 200]
        },
    };

    const mapContainer = document.getElementById("map");
    const descriptionContainer = document.getElementById("description-container");

    // Afficher la description par défaut lorsqu'on arrive sur la page
    descriptionContainer.innerHTML = `
        <h3>Bienvenue au Parc</h3>
        <p>Découvrez les services disponibles dans notre parc ! Cliquez sur un service pour obtenir plus d'informations.</p>
    `;
    descriptionContainer.style.display = "block";

    // Ajouter des cercles sur la carte au clic sur les services
    const serviceElements = document.querySelectorAll(".services");
    serviceElements.forEach(service => {
        service.addEventListener("click", () => {
            const serviceName = service.textContent.trim();
            const selectedService = services[serviceName];

            if (selectedService) {
                // Mise à jour de la description
                const { description, image, coords } = selectedService;
                descriptionContainer.innerHTML = `
                    <h3>${serviceName}</h3>
                    <p>${description || "Description non disponible."}</p>
                    ${image ? `<img src="${image}" alt="${serviceName}" style="max-width: 100%; height: auto;">` : "<p>Aucune image disponible pour ce service.</p>"}
                `;
                descriptionContainer.style.display = "block";

                // Supprimer les cercles existants
                const existingCircles = document.querySelectorAll(".circle");
                existingCircles.forEach(circle => circle.remove());

                // Ajouter un nouveau cercle
                if (coords) {
                    const [x, y] = coords;
                    const circle = document.createElement("div");
                    circle.className = "circle";
                    circle.style.left = `${x}px`;
                    circle.style.top = `${y}px`;
                    mapContainer.appendChild(circle);
                }
            }
        });
    });
});
