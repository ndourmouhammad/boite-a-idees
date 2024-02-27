<?php
// Démarrer la session si ce n'est pas déjà fait

// Détruire toutes les données de session
session_destroy();

// Rediriger l'utilisateur vers une page de connexion par exemple
header("Location: login.php");
exit;
?>
