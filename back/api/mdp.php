<?php
include('config.php');

// Récupérer les utilisateurs
$sql = "SELECT id, password_hash FROM admin_info";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $plain_password = $row['password_hash'];

    // Hashage du mot de passe
    $hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

    // Mise à jour du mot de passe dans la base
    $update_sql = "UPDATE admin_info SET password_hash = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("si", $hashed_password, $id);
    $stmt->execute();
}

echo "Mots de passe hashés avec succès.";
?>
