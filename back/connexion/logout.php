<?php
//deconnexion
session_start();
// clear localStorage data car mes infos clients sont dans le local storage
echo "<script>localStorage.clear();</script>";
$sql = "SELECT id, name, email, role FROM users WHERE email = '$email'";
session_destroy("SELECT id, name, email, role FROM users WHERE email = '$email'");

header("Location: ../../../front/HTML/connexion/index.html");
exit;
?>
