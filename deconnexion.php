<?php
// Détruire toutes les données de session
session_destroy();

// Rediriger l'utilisateur vers une page de connexion par exemple
header("Location: login.php");
exit;
?>
