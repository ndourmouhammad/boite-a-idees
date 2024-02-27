<?php
require('cnx.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil.css">
    <title>Boite à Idées</title>
</head>

<body>
    <header>
        <nav class="navbar1">
            <a href="#">Accueil</a>
            <a href="#">Ajouter une idée</a>
        </nav>
        <nav class="navbar2">
            <a href="deconnexion.php">Déconnexion</a>
            <?php while ($data2 = $req2->fetch(PDO::FETCH_ASSOC)) { ?>
                <a href="#"><?= ucfirst($data2['prenom']); ?> <?= ucfirst($data2['nom']); ?></a>
            <?php } ?>

        </nav>
    </header>
    <div class="container">
        <h2>Liste des Idées</h2>
        <?php while ($data = $req1->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="category-box">
                <p class="category-title">Catégorie: <?= ucfirst($data['Categorie']); ?></p>
                <p class="idea-description">Idee: <?= ucfirst($data['idees']); ?></p>
                <p class="idea-date">ajoutée le <?= ($data['date_ajout']); ?></p>
            </div>
        <?php } ?>
    </div>
</body>

</html>