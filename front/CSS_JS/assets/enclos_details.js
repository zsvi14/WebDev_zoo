// Fonction pour revenir à la liste des enclos
function retourListe() {
    window.location.href = 'liste_enclos.html'; // Modifier si nécessaire
}

// Récupérer les paramètres de l'URL (id de l'enclos)
const params = new URLSearchParams(window.location.search);
const enclosId = params.get('id');

// Vérifie qu'un ID est présent dans l'URL
if (enclosId) {
    // Charger les détails de l'enclos
    fetch(`http://localhost/WebDev_zoo/back/routes/details_enclos.php?id=${enclosId}`)
        .then(response => response.json())
        .then(data => {
            // Vérifier les données retournées
            if (data.error) {
                console.error(data.error);
                document.getElementById('enclos-name').textContent = "Erreur : " + data.error;
                return;
            }

            // Afficher le nom de l'enclos
            document.getElementById('enclos-name').textContent = data.enclos || "Nom non défini";

            // Afficher le biome
            document.getElementById('biome-name').textContent = data.biome || "Non défini";

            // Afficher les animaux
            const animalsContainer = document.getElementById('animals-container');
            animalsContainer.innerHTML = ''; // Nettoyer le conteneur

            if (data.animaux) {
                // Si des animaux existent, les afficher
                const animaux = data.animaux.split(', '); // Diviser les noms
                animaux.forEach(animal => {
                    const animalDiv = document.createElement('div');
                    animalDiv.classList.add('animal-card');

                    // Ajouter une image pour chaque animal
                    const img = document.createElement('img');
                    img.src = `../../../Image_enclos/${animal.toLowerCase()}.jpg`; // Ajuste le chemin si nécessaire
                    img.alt = animal;
                    img.classList.add('animal-image');

                    // Ajouter le nom de l'animal
                    const name = document.createElement('span');
                    name.textContent = animal;

                    animalDiv.appendChild(img);
                    animalDiv.appendChild(name);
                    animalsContainer.appendChild(animalDiv);
                });
            } else {
                // Message si aucun animal n'est trouvé
                animalsContainer.textContent = "Aucun animal dans cet enclos.";
            }
        })
        .catch(error => {
            console.error('Erreur lors du chargement des détails de l\'enclos :', error);
            document.getElementById('enclos-name').textContent = "Erreur de chargement.";
        });
} else {
    document.getElementById('enclos-name').textContent = "ID de l'enclos manquant.";
}
