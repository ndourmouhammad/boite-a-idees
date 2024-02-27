<?php
require('cnx.php');

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['utilisateur'])) {
    // Récupère les informations de l'utilisateur
    $utilisateur = $_SESSION['utilisateur'];
} else {
    // Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: login.php");
    exit(); // Assure que le script s'arrête après la redirection
}
?>
<header>
        <nav class="navbar1">
            <a href="index.php">Accueil</a>
            <a href="addIdea.php">Ajouter une idée</a>
        </nav>
        <nav class="navbar2">
            <a href="deconnexion.php">Déconnexion</a>
            <!-- Affiche le nom de l'utilisateur -->
            <a href="#"><?= $utilisateur['prenom']; ?> <?= $utilisateur['nom']; ?></a>
        </nav>
    </header>