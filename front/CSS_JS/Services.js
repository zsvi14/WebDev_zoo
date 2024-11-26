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
                Des micros-ondes sont à votre disposition pour faire réchauffer les repas des jeunes enfants !
            </p>
            <p>
                La Paillote est ouverte tous les jours.
            </p>`,
            image: "../../Images/images_services/paillote.jpg",
            coords: [800, 400] // Coordonnées relatives dans l'image
        },
        "Café Nomade": {
            description: "Un café ambulant pour vos envies de boissons chaudes.",
            image: "../../Images/images_services/cafe_nom.jpg",
            coords: [600, 300]
        },
        "Café": {
            description: "Un endroit cosy pour savourer un bon café.",
            image: "../../Images/images_services/cafe.jpg",
            coords: [400, 200]
        }
        // Ajoutez les autres services ici...
    };

    const mapContainer = document.getElementById("map");
    const descriptionContainer = document.getElementById("description-container");

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
                    ${image ? `<img src="${image}" alt="${serviceName}" style="max-width: 100%; height: auto;">` : ""}
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
