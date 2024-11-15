// Fonction pour charger les enclos depuis l'API ou un fichier local
async function loadEnclos() {
    try {
        let response;

        // Vérification de l'environnement (localhost ou production)
        if (location.hostname === "localhost") {
            // Chargement depuis le fichier JSON en local
            response = await fetch('/front/CSS_JS/assets/enclos.json');
        } else {
            // Chargement depuis l'API en production
            response = await fetch('http://localhost/backend/routes/enclos.php');
        }

        if (!response.ok) {
            throw new Error('Erreur réseau');
        }

        const enclos = await response.json();

        // Stocker les enclos dans une variable globale pour la recherche
        window.enclosData = enclos;

        // Afficher les enclos dans le DOM
        displayEnclos(enclos);
    } catch (error) {
        console.error("Erreur lors du chargement des enclos :", error);
    }
}

// Fonction pour afficher les enclos dans le DOM
function displayEnclos(enclos) {
    const enclosListDiv = document.getElementById('enclos-list');
    enclosListDiv.innerHTML = enclos
        .map(enclos => `
            <div class="enclos-item">
                <h3>${enclos.nom}</h3>
                <p>Animaux présents :</p>
                <ul>
                    ${enclos.animaux.map(animal => `<li>${animal.nom}</li>`).join('')}
                </ul>
            </div>
        `)
        .join('');
}

// Fonction de recherche par animal
function searchAnimal() {
    const query = document.getElementById("animal-search").value.toLowerCase();

    // Filtrer les enclos en fonction de la recherche
    const filteredEnclos = window.enclosData.filter(enclos =>
        enclos.animaux.some(animal => animal.nom.toLowerCase().includes(query))
    );

    // Afficher les enclos filtrés
    displayEnclos(filteredEnclos);
}

// Charger les enclos au chargement de la page
window.onload = loadEnclos;


