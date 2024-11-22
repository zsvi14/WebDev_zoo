// Charger les enclos depuis l'API
async function loadEnclos() {
    try {
        const response = await fetch('http://localhost/WebDev_zoo/back/routes/enclos.php');
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

// Afficher les enclos dans une structure accessible
function displayEnclos(enclos) {
    const enclosListDiv = document.getElementById('enclos-list');
    enclosListDiv.innerHTML = enclos
        .map((enclos, index) => `
            <section class="enclos-item" aria-labelledby="enclos-title-${index}">
                <h3 id="enclos-title-${index}">${enclos.nom}</h3>
                ${enclos.animaux.length > 0 ? `
                    <ul>
                        ${enclos.animaux.map(animal => `<li>${animal.nom}</li>`).join('')}
                    </ul>
                ` : `
                    <p>Aucun animal présent dans cet enclos.</p>
                `}
            </section>
        `)
        .join('');
}


// Charger les enclos au chargement de la page
document.addEventListener('DOMContentLoaded', loadEnclos);



