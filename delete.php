<?php
require('cnx.php');
// Vérifie si l'ID de l'idée est présent dans l'URL
if (isset($_GET['id'])) {
    // Récupère l'ID de l'idée depuis l'URL
    $id = $_GET['id'];

    // Exécute une requête SQL pour supprimer l'idée avec cet ID
    $sql = $cnx->prepare("DELETE FROM Idees WHERE id = :id");
    $sql->execute(array(':id' => $id));

    // Vérifie si l'idée a été supprimée avec succès
    $count = $sql->rowCount();
    if ($count > 0) {
        // Affiche un message de succès si l'idée a été supprimée
        echo "L'idée a été supprimée avec succès.";
        header("Location: index.php");
    } else {
        echo "L'idée avec l'ID spécifié n'existe pas.";
        // Redirige vers la page d'accueil
header("Location: index.php");
exit();
    }
} else {
    echo "Aucun ID d'idée spécifié.";
}

?>
