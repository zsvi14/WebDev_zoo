<!-- fonctions utilitaires -->
<?php
function getUserByEmail($email) {
    global $conn;
    $sql = "SELECT id, name, email, role FROM users WHERE email = '$email'";
    return $conn->query($sql)->fetch_assoc();
}
?>
