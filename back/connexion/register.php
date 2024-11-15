<!-- traitement de l inscription -->
<?php
include('config.php');

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'visitor')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Inscription réussie."]);
    } else {
        echo json_encode(["success" => false, "message" => "Erreur lors de l'inscription."]);
    }
}
?>

