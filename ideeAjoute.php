<?php
 require('cnx.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addIdea.css">
    <title>Idée ajoutée avec succès</title>
</head>
<body>
    <?php include('header.php') ?>
<div class="container">
<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclure le fichier de connexion à la base de données
   

    // Récupérer les données du formulaire
    $libelle = $_POST['libelle'];
    $texte = $_POST['texte'];
    $statut = $_POST['statut'];
    $date_creation = $_POST['date_creation'];
    $id_utilisateur = $_SESSION['utilisateur']['id'];

    // Vérifier si des catégories ont été sélectionnées
    if(isset($_POST['categories'])) {
        // Boucler à travers les catégories sélectionnées
        foreach ($_POST['categories'] as $id_cat) {
            // Préparer la requête d'insertion
            $sql = $cnx->prepare("INSERT INTO Idees (libelle, texte, statut, date_creation, id_cat, id_utilisateur) VALUES (:libelle, :texte, :statut, :date_creation, :id_cat, :id_utilisateur)");
            // Exécuter la requête en liant les valeurs des paramètres
            $sql->execute(array(
                ':libelle' => $libelle,
                ':texte' => $texte,
                ':statut' => $statut,
                ':date_creation' => $date_creation,
                ':id_cat' => $id_cat,
                ':id_utilisateur' => $id_utilisateur
            ));
        }
        echo "Les idées ont été ajoutées avec succès.";
    } else {
        echo "Veuillez sélectionner au moins une catégorie.";
    }
} else {
    // Rediriger l'utilisateur vers la page d'accueil si le formulaire n'a pas été soumis
    header("Location: index.php");
    exit();
}
?>
<p><a href="index.php">Aller sur la page d'Accueil</a></p>
</div>
</body>
</html>