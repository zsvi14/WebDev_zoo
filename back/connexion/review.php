<?php
 // Connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bddzoo';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
} 

if ($stmt->execute()) {
// Review added successfully
  header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?success=true");
  exit();
} else {
      // Error adding review
       header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?error=true");
       exit();
}
$conn->close();
?>