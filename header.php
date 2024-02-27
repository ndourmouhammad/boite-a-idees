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