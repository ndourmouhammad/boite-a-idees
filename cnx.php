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

    if ($req->rowCount() > 0) {
        return true; 
    } else {
        return false; 
    }
}
?>
