<?php
require('cnx.php');

//Récupérer les détails de l'idée basée sur son identifiant depuis la base de données
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $cnx->prepare("SELECT * FROM Idees WHERE id = :id");
    $sql->execute(array(':id' => $id));
    $idee = $sql->fetch(PDO::FETCH_ASSOC);
}

// Récupérer les catégories depuis la base de données
$sqlCategories = $cnx->prepare("SELECT * FROM Categorie");
$sqlCategories->execute();
$categories = $sqlCategories->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/addIdea.css">
    <title>Modifier une idée</title>
</head>
<body>
<?php include('header.php') ?>
<div class="container">
    <h1>Modifier une idée</h1>
    <form action="traitement-update.php" method="post">
        <input type="hidden" name="id_idee" value="<?php echo $idee['id']; ?>">
        <label for="libelle">Libellé :</label><br>
        <input type="text" id="libelle" name="libelle" value="<?php echo $idee['libelle']; ?>" required><br>
        <label for="texte">Texte :</label><br>
        <textarea id="texte" name="texte" rows="5" cols="33"><?php echo $idee['texte']; ?></textarea><br>
        <label for="statut">Statut :</label><br>
        <input type="text" id="statut" name="statut" value="<?php echo $idee['statut']; ?>" required><br>
        <label for="categorie">Catégorie :</label><br>
        <select id="categorie" name="id_cat">
            <?php foreach ($categories as $categorie): ?>
                <option value="<?php echo $categorie['id']; ?>" <?php if($categorie['id'] == $idee['id_cat']) echo 'selected'; ?>><?php echo $categorie['nom']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Modifier">
    </form>
</div>
</body>
</html>
