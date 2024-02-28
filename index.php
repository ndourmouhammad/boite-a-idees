<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page-index.css">
    <title>Boite à Idées</title>
    <style>
        /* Cacher la boîte lorsqu'une case à cocher est cochée */
        .toggle:checked + .category-box {
            display: none;
        }

        /* Cacher la case à cocher lorsqu'une boîte est masquée */
        .toggle:checked {
            display: none;
        }
    </style>
</head>
<body>
    <?php include('header.php') ?>
    <div class="container">
        <h2>Liste des Idées</h2>
        <?php while ($data = $req1->fetch(PDO::FETCH_ASSOC)) { ?>
            <input type="checkbox" class="toggle">
            <div class="category-box">
                <p class="category-title">Catégorie: <?= ucfirst($data['Categorie']); ?></p>
                <p class="idea-description">
                    <a href="detail.php?id=<?= $data['id']; ?>">Idee: <?= ucfirst($data['idees']); ?></a>
                </p>
                <p class="idea-date">ajoutée le <?= ($data['date_ajout']); ?> par <?= ucfirst($data['prenom']); ?> <?= ucfirst($data['nom']); ?>
                </p>
            </div>
        <?php } ?>
    </div>
</body>
</html>
