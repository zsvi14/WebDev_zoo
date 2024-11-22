<?php
//deconnexion
session_start();
// clear localStorage data car mes infos clients sont dans le local storage
echo "<script>localStorage.clear();</script>";

header("Location: index.html");
exit;
?>