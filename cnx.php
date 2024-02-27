<?php
$dsn = 'mysql:host=localhost;dbname=idee_db;charset=utf8';
$user = 'root';
$pass = '';

try {
    $cnx = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Une erreur est survenue !' . $e->getMessage();
}

function connexion($cnx, $email, $password)
{
    $req = $cnx->prepare("SELECT * FROM Utilisateur WHERE email = :email AND mdp = :mdp");
    $req->bindParam(':email', $email);
    $req->bindParam(':mdp', $password);
    $req->execute();
    $utilisateur = $req->fetch(PDO::FETCH_ASSOC);
    if ($utilisateur) {
        // Démarrage de la session
        session_start();
        $_SESSION['utilisateur'] = $utilisateur;
        return true;
    } else {
        return false;
    }
}




$sql1 = "SELECT c.nom AS Categorie, 
                i.libelle AS idees, 
                DATE_FORMAT(i.date_creation, '%d %M %Y à %H:%i') AS date_ajout
        FROM Categorie c
        JOIN Idees i ON c.id = i.id_cat
        GROUP BY c.nom";

$req1 = $cnx->prepare($sql1);
$req1->execute();

$sql2 = 'SELECT * FROM Utilisateur';
$req2 = $cnx->prepare($sql2);
$req2->execute();