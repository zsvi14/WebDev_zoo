
async function loadEnclosDetails(enclosId) {
    const response = await fetch(`http://localhost/backend/routes/enclos.php?id=${enclosId}`);
    const enclos = await response.json();
    
    document.getElementById('enclos-name').textContent = enclos.nom;
    
    // Affichage du carrousel de photos
    const carrousel = document.getElementById('carrousel');
    carrousel.innerHTML = enclos.photos.map(photo => `
        <img src="${photo.url}" alt="${photo.description}" />
    `).join('');
    
    // Affichage des animaux
    const animalsList = document.getElementById('animals-list');
    animalsList.innerHTML = enclos.animaux.map(animal => `
        <li>${animal.nom} (${animal.species})</li>
    `).join('');
    
    // Affichage de la description
    document.getElementById('enclos-description').textContent = enclos.description;
}

// Charger les détails de l'enclos à partir de l'ID passé dans l'URL
const urlParams = new URLSearchParams(window.location.search);
const enclosId = urlParams.get('id');
if (enclosId) {
    loadEnclosDetails(enclosId);
}
