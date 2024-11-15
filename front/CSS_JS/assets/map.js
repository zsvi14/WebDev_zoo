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

    // Initialiser la carte et définir ses coordonnées et son niveau de zoom
    var map = L.map('map').setView([0, 0], 1); // Zoom et coordonnées par défaut

    // Ajouter l'image SVG comme superposition (overlay)
    L.imageOverlay('../front/Images/plan_park.svg', [[-100, -100], [100, 100]]).addTo(map);

    // Ajuster la vue pour que l'image soit bien visible
    map.fitBounds([[-100, -100], [100, 100]]);



    // Définir les dimensions de l'image SVG en pixels
    const width = 2400.000000 pt;   //  SVG width="2400.000000pt" height="1260.000000pt"
    const height = 1260.000000 pt;
    const bounds = [[0, 0], [height, width]];

    // Ajouter l'image SVG en tant que fond de carte
    L.imageOverlay('../front/Images/plan_park.svg', bounds).addTo(map);

    // Ajuster la vue de la carte pour qu'elle corresponde aux dimensions de l'image
    map.fitBounds(bounds);

    // zones interactives
    const lodge = L.rectangle([[200, 200], [300, 300]], {color: "red", weight: 2});
    lodge.addTo(map);
    lodge.bindPopup("lodge");

    const point_eau = L.circle([400, 600], { radius: 50, color: "blue", fillColor: "#30f", fillOpacity: 0.5 });
    point_eau.addTo(map);
    point_eau.bindPopup("point d'eau");
});
