<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Vérifie que tous les champs requis sont envoyés
    $rating = isset($_GET['rating']) ? htmlspecialchars($_GET['rating']) : null;
    $name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : null;
    $review = isset($_GET['review']) ? htmlspecialchars($_GET['review']) : null;
    $enclosureId = isset($_GET['enclosureId']) ? htmlspecialchars($_GET['enclosureId']) : null;

    // Début du HTML afin de modifier l affichage de la page commentaire publier
    echo '<!DOCTYPE html>';
    echo '<html lang="fr">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Commentaire soumis</title>';
    echo '<link rel="stylesheet" href="../../front/CSS_JS/styles.css">'; // Lien vers le fichier CSS
    echo '</head>';
    echo '<body>';
    echo '<header>';
    echo '<button class="home-button" onclick="window.location.href=\'../../front/HTML/connexion/home.html\';">Retour à l\'accueil</button>';
    echo '<h1>🦒🐘🦓 Le rrrh parc 🦁🦓🦒</h1>';
    echo '</header>';
    echo '<main>';

    // Vérifie si les données sont présentes
    if ($rating && $name && $review && $enclosureId) {
        echo '<div class="comment-container">';
        echo '<h1>Commentaire soumis avec succès !</h1>';
        echo "<p><strong>Note :</strong> $rating 🦁</p>";
        echo "<p><strong>Nom :</strong> $name</p>";
        echo "<p><strong>Avis :</strong> $review</p>";
        echo "<p><strong>Enclos :</strong> $enclosureId</p>";
        echo '</div>';
    } else {
        echo '<p>Veuillez remplir tous les champs avant de soumettre.</p>';
    }

    // Fin du HTML
    echo '</main>';
    echo '</body>';
    echo '</html>';
} else {
    // Affiche une erreur si la méthode n'est pas GET
    echo '<!DOCTYPE html>';
    echo '<html lang="fr">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Erreur</title>';
    echo '<link rel="stylesheet" href="../../CSS_JS/styles.css">'; // Lien vers le fichier CSS
    echo '</head>';
    echo '<body>';
    echo '<header>';
    echo '<button class="home-button" onclick="window.location.href=\'../connexion/home.html\';">Retour à l\'accueil</button>';
    echo '<h1>Erreur</h1>';
    echo '</header>';
    echo '<main>';
    echo '<p>Erreur : ce script accepte uniquement les requêtes GET.</p>';
    echo '</main>';
    echo '</body>';
    echo '</html>';
}
?>
