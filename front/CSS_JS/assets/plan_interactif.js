// map.js
document.addEventListener("DOMContentLoaded", function () {
    // Initialiser la carte
    const map = L.map('map', {
        minZoom: -1,
        maxZoom: 2,
        center: [0, 0],
        zoom: 0,
        crs: L.CRS.Simple
    });

    // Définir les dimensions de l'image SVG en pixels
    const width = 1000;   // Remplace avec la largeur réelle de ton SVG
    const height = 800;   // Remplace avec la hauteur réelle de ton SVG
    const bounds = [[0, 0], [height, width]];

    // Ajouter l'image SVG en tant que fond de carte
    L.imageOverlay('images/plan-park.svg', bounds).addTo(map);

    // Ajuster la vue de la carte pour qu'elle corresponde aux dimensions de l'image
    map.fitBounds(bounds);

    // Exemples de zones interactives
    const attractionZone = L.rectangle([[200, 200], [300, 300]], {color: "red", weight: 2});
    attractionZone.addTo(map);
    attractionZone.bindPopup("Attraction principale");

    const jeuxZone = L.circle([400, 600], { radius: 50, color: "blue", fillColor: "#30f", fillOpacity: 0.5 });
    jeuxZone.addTo(map);
    jeuxZone.bindPopup("Espace de jeux pour enfants");
});
