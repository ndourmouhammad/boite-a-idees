<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=idee_db;charset=utf8';
$user = 'root';
$pass = '';

try {
    $cnx = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Une erreur est survenue !' . $e->getMessage();
}

// lister les idées par catégorie

$sql1 = "SELECT i.id ,c.nom AS Categorie, i.libelle AS idees, DATE_FORMAT(i.date_creation, '%d %M %Y à %H:%i') AS date_ajout, u.prenom, u.nom FROM Categorie c LEFT JOIN Idees i ON c.id = i.id_cat LEFT JOIN Utilisateur u ON u.id = i.id_utilisateur ORDER BY date_ajout DESC";

$req1 = $cnx->prepare($sql1);
$req1->execute();

$sql2 = 'SELECT * FROM Utilisateur';
$req2 = $cnx->prepare($sql2);
$req2->execute();


