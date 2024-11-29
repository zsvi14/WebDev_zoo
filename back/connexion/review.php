<?php/*
// Assuming you have a database connection established

// Get the form data
$rating = $_POST['rating'];
$review = $_POST['review'];
$enclosureId = $_POST['enclosureId'];

// Insert the review into the database
$sql = "INSERT INTO reviews (rating, review, enclosure_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isi", $rating, $review, $enclosureId);

if ($stmt->execute()) {
    // Review added successfully
    header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?success=true");
    exit();
} else {
    // Error adding review
    header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?error=true");
    exit();
}

$stmt->close();
$conn->close(); */





// Connexion à la base de données (à remplacer par vos informations de connexion)
$servername = "votre_serveur";
$username = "votre_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_base_de_données";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire (avec validation)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST["rating"];
    $review = $_POST["review"];
    $enclosureId = $_POST["enclosureId"];

    // Validation des données (exemple)
    if (empty($rating) || empty($review) || empty($enclosureId)) {
        echo "Les champs rating, review et enclosureId sont requis.";
        exit();
    }

    // Insertion dans la base de données
    $sql = "INSERT INTO reviews (rating, review, enclosure_id) VALUES (?, ?, ?)";
   /* $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $rating, $review, $enclosureId);

    if ($stmt->execute()) {
        echo "Avis ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout de l'avis: " . $stmt->error;
    }

    $stmt->close();*/

    if ($stmt->execute()) {
        // Review added successfully
        header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?success=true");
        exit();
      } else {
        // Error adding review
        header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?error=true");
        exit();
      }



}

$conn->close();
?>