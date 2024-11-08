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
    window.location.href = "index.html";
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
        window.location.href = "profile.html";
    } else {
        alert("Email ou mot de passe incorrect.");
    }
});

// Affichage des informations du profil
if (window.location.pathname.includes("profile.html")) {
    const storedUser = JSON.parse(localStorage.getItem("user"));
    const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

    if (storedUser && isLoggedIn) {
        document.getElementById("displayUsername").textContent = storedUser.username;
        document.getElementById("displayEmail").textContent = storedUser.email;
    } else {
        alert("Vous devez être connecté pour voir cette page.");
        window.location.href = "index.html";
    }
}

// Déconnexion
function logout() {
    localStorage.removeItem("isLoggedIn");
    alert("Déconnexion réussie !");
    window.location.href = "index.html";
}
