async function loadEnclos() {
    const response = await fetch('http://localhost/backend/routes/enclos.php');
    const enclos = await response.json();
    
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

// Fonction de recherche par animal
async function searchAnimal() {
    const query = document.getElementById("animal-search").value;
    const response = await fetch(`http://localhost/backend/routes/enclos.php?search=${query}`);
    const enclos = await response.json();

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

window.onload = loadEnclos;
