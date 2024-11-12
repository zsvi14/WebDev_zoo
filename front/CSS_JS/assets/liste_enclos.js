// Fonction pour charger les enclos depuis l'API
async function loadEnclos() {
    const response = await fetch('http://localhost/backend/routes/enclos.php');
    const enclos = await response.json();
    
    // Stocker les enclos dans une variable globale pour la recherche
    window.enclosData = enclos;
    
    // Afficher les enclos dans le DOM
    displayEnclos(enclos);
}

// Fonction pour afficher les enclos
function displayEnclos(enclos) {
    const enclosListDiv = document.getElementById('enclos-list');
    enclosListDiv.innerHTML = enclos.map(enclos => `
        <div class="enclos-item">
            <h3>${enclos.nom}</h3>
            <p>Animaux présents :</p>
            <ul>
                ${enclos.animaux.map(animal => `<li>${animal.nom}</li>`).join('')}
            </ul>
        </div>
    `).join('');
}

// Fonction de recherche par animal (filtrage local)
function searchAnimal() {
    const query = document.getElementById("animal-search").value.toLowerCase();
    
    // Filtrer les enclos en fonction de la recherche
    const filteredEnclos = window.enclosData.filter(enclos => {
        return enclos.animaux.some(animal => animal.nom.toLowerCase().includes(query));
    });

    // Afficher les enclos filtrés
    displayEnclos(filteredEnclos);
}

// Charger les enclos au chargement de la page
window.onload = loadEnclos;

