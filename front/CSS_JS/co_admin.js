
// Connexion de l'utilisateur
document.getElementById("loginForm")?.addEventListener("submit", function(e) {
    e.preventDefault();
    const email = document.getElementById("loginEmail").value;
    const password = document.getElementById("loginPassword").value;

    const storedUser = JSON.parse(localStorage.getItem("user"));

    if (storedUser && storedUser.email === email && storedUser.password === password) {
        localStorage.setItem("isLoggedIn", "true");
        alert("Connexion réussie !");
        window.location.href = "HTML/connexion/profile.html";
    } else {
        alert("Email ou mot de passe incorrect.");
    }
});
/*
// Affichage des informations du profil
if (window.location.pathname.includes("HTML/connexion\inscrip\connexionprofile.html")) {
    const storedUser = JSON.parse(localStorage.getItem("user"));
    const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

    if (storedUser && isLoggedIn) {
        document.getElementById("displayUsername").textContent = storedUser.username;
        document.getElementById("displayEmail").textContent = storedUser.email;
    } else {
        alert("Vous devez être connecté pour voir cette page.");
        window.location.href = "HTML/connexion/index.html";
    }
}*/
function logout() {
    fetch("/WebDev_zoo/back/connexion/logout.php", { method: "POST" })
    .then(() => {
        alert("Déconnexion réussie. Vous allez être redirigé.");
        window.location.href = "/WebDev_zoo/front/HTML/connexion/index.html"; // Modifier avec le chemin correct
    })
    .catch((error) => {
        console.error("Erreur lors de la déconnexion :", error);
        alert("Une erreur s'est produite lors de la déconnexion.");
    });
}


//2.Système de notation et avis des utilisateurs sur les enclos
/*
if (window.location.pathname.includes("HTML/connexion\inscrip\connexionprofile.html")) {
    const storedUser = JSON.parse(localStorage.getItem("user"));
    const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

    if (storedUser && isLoggedIn) {
        document.getElementById("displayUsername").textContent = storedUser.username;
        document.getElementById("displayEmail").textContent = storedUser.email;
    } else {
        alert("Vous devez être connecté pour voir cette page.");
        window.location.href = "HTML/connexion/index.html";
    }
}





document.getElementById("reviewForm").addEventListener("submit", async function(event) {
    event.preventDefault();
    const rating = document.getElementById("rating").value;
    const review = document.getElementById("review").value;
    const enclosureId = document.getElementById("enclosureId").value;

    const response = await fetch("../../back/api/add_review.php", {  // Chemin vers api
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ rating, review, enclosureId })
    });

    if (response.ok) {
        alert("Review submitted successfully");
        loadReviews();
    } else {
        alert("Failed to submit review");
    }
});

async function loadReviews() {
    const enclosureId = document.getElementById("enclosureId").value;
    const response = await fetch(`back/api/get_reviews.php?enclosure_id=${enclosureId}`);  // Chemin vers api
    const reviews = await response.json();

    const reviewsContainer = document.getElementById("reviewsContainer");
    reviewsContainer.innerHTML = "";

    reviews.forEach(review => {
        const reviewDiv = document.createElement("div");
        reviewDiv.classList.add("review");
        reviewDiv.innerHTML = `<strong>Rating:</strong> ${review.rating}/5<br><strong>Review:</strong> ${review.review}`;
        reviewsContainer.appendChild(reviewDiv);
    });
}

window.onload = loadReviews;
*//*

const form = document.getElementById('reviewForm');
const reviewsContainer = document.getElementById('reviewsContainer');

form.addEventListener('submit', async (event) => {
  event.preventDefault();

  const rating = document.getElementById("rating").value;
  const review = document.getElementById("review").value;
  const enclosureId = document.getElementById("enclosureId").value;

  const response = await fetch("../../back/api/add_review.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ rating, review, enclosureId })
  });

  if (response.ok) {
    document.getElementById('review-message').textContent = 'Avis soumis avec succès !';
    clearForm(); // Clear the form after successful submission (optional)
    loadReviews(); // Load reviews after submission
  } else {
    document.getElementById('review-message').textContent = 'Erreur lors de la soumission du commentaire.';
  }
});

async function loadReviews() {
    const enclosureId = document.getElementById("enclosureId").value;
    const response = await fetch(`back/api/get_reviews.php?enclosure_id=${enclosureId}`);
    const reviews = await response.json();

    reviewsContainer.innerHTML = ""; // Clear the container before adding new reviews

    reviews.forEach(review => {
        const reviewDiv = document.createElement("div");
        reviewDiv.classList.add("review");
        reviewDiv.innerHTML = `
            <div class="rating">
                ${createStars(review.rating)}
            </div>
            <p>${review.review}</p>
        `;
        reviewsContainer.appendChild(reviewDiv);
    });

    if (reviews.length === 0) {
        reviewsContainer.innerHTML = "<p>Aucun avis pour cet enclos pour le moment.</p>";
    }
}

function createStars(rating) {
    let stars = '';
    for (let i = 0; i < rating; i++) {
        stars += '★';
    }
    return stars;
}*/







/*page d acceuil du site presentation
active les photos du home et affiche/ferme le modal de la carte*/
// Fonction pour afficher la carte du zoo
function showMap() {
    document.getElementById("mapModal").style.display = "block";
}

// Fonction pour fermer le modal de la carte
function closeMap() {
    document.getElementById("mapModal").style.display = "none";
}

// Fermer la carte si on clique en dehors du modal
window.onclick = function(event) {
    var modal = document.getElementById("mapModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
};





/*carousel photos home */
const carouselSlide = document.querySelector('.carousel-slide');
const images = carouselSlide.querySelectorAll('img');
let currentIndex = 1;

// Fonction pour afficher une image spécifique
/*function showImage(index) {

  images[index].classList.add('active'); // Ajoute la classe 'active' à l'image actuelle
}

// Afficher la première image par défaut
showImage(currentIndex);*/

// Changer d'image toutes les 10 secondes (facultatif)
// setInterval(() => {
//   currentIndex = (currentIndex + 1) % images.length;
//   showImage(currentIndex);
// }, 10000);
