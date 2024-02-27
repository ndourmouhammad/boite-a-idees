<?php
require('cnx.php');


// Vérifie si l'ID de l'idée est présent dans l'URL
if (isset($_GET['id'])) {
    // Récupère l'ID de l'idée depuis l'URL
    $id = $_GET['id'];

    // Exécute une requête SQL pour obtenir les détails de l'idée avec cet ID
    $sql = $cnx->prepare("SELECT i.id, i.libelle, i.texte, i.date_creation, c.nom AS categorie, u.nom , u.prenom
    FROM Idees i 
    JOIN Categorie c ON c.id = i.id_cat 
    JOIN Utilisateur u ON i.id_utilisateur = u.id 
    WHERE i.id = :id;");
    $sql->execute(array(':id' => $id,));
    $data3 = $sql->fetch(PDO::FETCH_ASSOC);

    // Vérifie si l'idée existe
    if ($data3) {
        // Affiche les détails de l'idée
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="addIdea.css">
            <title>Détails de l'idée</title>
        </head>

        <body>
            <?php include('header.php') ?>

            <div class="container">
                <p><a href="index.php">Retour sur la liste des idées</a></p>
                <h1><?= $data3['libelle']; ?></h1>
                <p><?= $data3['texte']; ?></p>
                <div class="details">
                    <p>Auteur : <?= $data3['prenom']; ?> <?= $data3['nom']; ?></p>
                    <p>Date de publication : <?= $data3['date_creation']; ?></p>
                    <p>Catégorie : <?= $data3['categorie']; ?></p>
                </div>
                <div class="update-delete">
                    <div class="update">
                        <a href="update.php?id=<?= $data3['id']; ?>"><button>Modifier</button></a>
                    </div>
                    <div class="delete">
                        <a href="delete.php?id=<?= $data3['id']; ?>"><button>Supprimer</button></a>
                    </div>
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        echo "L'idée avec l'ID spécifié n'existe pas.";
    }
} else {
    echo "Aucun ID d'idée spécifié.";
}
?>