<?php
//deconnexion
session_start();
// clear localStorage data car mes infos clients sont dans le local storage
echo "<script>localStorage.clear();</script>";

header("Location: ../../front/HTML/connexion/index.html");
exit;
?>