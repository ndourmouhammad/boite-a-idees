<?php
require('cnx.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de la présence des données du formulaire
    if (isset($_POST['id_idee'], $_POST['libelle'], $_POST['texte'], $_POST['statut'], $_POST['id_cat'])) {
        
        // Récupération des données du formulaire
        $id_idee = $_POST['id_idee'];
        $libelle = $_POST['libelle'];
        $texte = $_POST['texte'];
        $statut = $_POST['statut'];
        $id_cat = $_POST['id_cat'];

        // Mise à jour de l'enregistrement dans la base de données
        $sql = $cnx->prepare("UPDATE Idees SET libelle = :libelle, texte = :texte, statut = :statut, id_cat = :id_cat WHERE id = :id_idee");
        $sql->execute(array(':libelle' => $libelle, ':texte' => $texte, ':statut' => $statut, ':id_cat' => $id_cat, ':id_idee' => $id_idee));

        // Redirection vers la page de détails de l'idée mise à jour
        header("Location: detail.php?id=$id_idee");
        exit();
    } else {
        // Si des données sont manquantes, afficher un message d'erreur
        echo "Tous les champs du formulaire doivent être remplis.";
    }
} else {
    // Si la requête n'est pas de type POST, rediriger vers la page d'accueil ou afficher un message d'erreur
    echo "La page traitement.php ne peut être accédée directement.";
}
?>
