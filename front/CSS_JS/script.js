// Enregistrement de l'utilisateur
//inscription, connexion, affichage des info de profil et déconnexion.
document.getElementById("registerForm")?.addEventListener("submit", function(e) {
    e.preventDefault();
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Sauvegarder les informations dans localStorage
    const user = { username, email, password };
    localStorage.setItem("user", JSON.stringify(user));
    alert("Inscription réussie ! Vous pouvez maintenant vous connecter.");
    window.location.href = "HTML/connexion/index.html";
});

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

// Affichage des informations du profil
if (window.location.pathname.includes("HTML/connexion\inscrip\connexionprofile.html")) {
    const storedUser = JSON.parse(localStorage.getItem("user"));
    const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

    if (storedUser && isLoggedIn) {
        document.getElementById("displayUsername").textContent = storedUser.username;
        document.getElementById("displayEmail").textContent = storedUser.email;
    } else {
        alert("Vous devez être connecté pour voir cette page.");
        window.location.href = "HTML/connexion\inscrip\connexion/index.html";
    }
}

// Déconnexion
function logout() {
    localStorage.removeItem("isLoggedIn");
    alert("Déconnexion réussie !");
    window.location.href = "HTML/connexion\inscrip\connexion/index.html"; //chemin vers index.html
}


//2.Système de notation et avis des utilisateurs sur les enclos
document.getElementById("reviewForm").addEventListener("submit", async function(event) {
    event.preventDefault();
    const rating = document.getElementById("rating").value;
    const review = document.getElementById("review").value;
    const enclosureId = document.getElementById("enclosureId").value;

    const response = await fetch("back/api/add_review.php", {  // Chemin vers api
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
