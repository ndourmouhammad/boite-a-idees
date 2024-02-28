<?php
require('cnx.php');
$libelle = "Votre libellé";
$texte = "Votre texte";
$statut = "Statut de votre idée";
$date_creation = date("Y-m-d H:i:s");


$categories = [
    ['id' => 1, 'nom' => 'Suggestions'],
    ['id' => 2, 'nom' => 'Recommandations'],
    ['id' => 3, 'nom' => 'Propositions'],
    ['id' => 4, 'nom' => 'Projets']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addIdea.css">
    <title>Ajouter des idées</title>
</head>
<body>
<?php include('header.php') ?>
    <div class="container">
        <h1>Ajouter une idée</h1>
    <form action="ideeAjoute.php" method="post">
        <label for="libelle">Libellé :</label><br>
        <input type="text" id="libelle" name="libelle" required><br>
        <label for="texte">Texte :</label><br>
        <textarea id="texte" name="texte" rows="5" cols="33"></textarea><br>
        <label for="statut">Statut :</label><br>
        <input type="text" id="statut" name="statut" required><br>
        <input type="hidden" name="date_creation" value="<?php echo date("Y-m-d H:i:s"); ?>">
        <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['utilisateur']['id']; ?>">
        

        <p>Sélectionnez la catégorie :</p>
        <?php foreach ($categories as $categorie): ?>
            <input type="radio" id="cat_<?php echo $categorie['id']; ?>" name="categories[]" value="<?php echo $categorie['id']; ?>">
            <label for="cat_<?php echo $categorie['id']; ?>"><?php echo $categorie['nom']; ?></label><br>
        <?php endforeach; ?>

        <br>
        <input type="submit" value="Ajouter">
    </form>
    </div>
</body>
</html>
