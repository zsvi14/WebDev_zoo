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
    const serviceElements = document.querySelectorAll(".services");
    const descriptionContainer = document.getElementById("description-container");

    // Afficher la description par défaut lorsqu'on arrive sur la page
    descriptionContainer.innerHTML = `
        <h3>Bienvenue au Parc</h3>
        <p>Découvrez les services disponibles dans notre parc ! Cliquez sur un service pour obtenir plus d'informations.</p>
    `;
    descriptionContainer.style.display = "block";

      // Fonction pour afficher la description
      function displayDescription(serviceName) {
          const selectedService = services[serviceName];
          if (selectedService) {
              descriptionContainer.innerHTML = `
                  <h3>${serviceName}</h3>
                  <p>${selectedService.description || "Description non disponible."}</p>
                  ${selectedService.image ? `<img src="${selectedService.image}" alt="${serviceName}" style="max-width: 100%; height: auto;">` : ""}
              `;
              descriptionContainer.style.display = "block";
          } else {
              descriptionContainer.innerHTML = `<p>Description non disponible pour ce service.</p>`;
          }
      }

      // Fonction pour créer un cercle
      function createCircle(serviceName) {
          const selectedService = services[serviceName];

          // Supprimer les cercles existants
          document.querySelectorAll(".circle").forEach(circle => circle.remove());

          if (selectedService && selectedService.coords) {
              const [xPercent, yPercent] = selectedService.coords;

              const circle = document.createElement("div");
              circle.className = "circle";
              circle.style.left = `${xPercent}%`; // Positionner en pourcentage
              circle.style.top = `${yPercent}%`; // Positionner en pourcentage
              circle.style.position = "absolute"; // Position absolue dans la carte
              circle.style.transform = "translate(-50%, -50%)"; // Centrer le cercle
              circle.setAttribute("aria-label", serviceName);

              mapContainer.appendChild(circle);
          }
      }

      // Gestion des clics sur les services
      serviceElements.forEach(service => {
          service.addEventListener("click", () => {
              const serviceName = service.textContent.trim();
              displayDescription(serviceName);
              createCircle(serviceName);
          });
      });

      // Repositionner les cercles lors du redimensionnement
      window.addEventListener("resize", () => {
          const visibleCircle = document.querySelector(".circle");
          if (visibleCircle) {
              const serviceName = visibleCircle.getAttribute("aria-label");
              createCircle(serviceName); // Repositionner le cercle
          }
      });
  });
