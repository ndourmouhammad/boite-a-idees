<?php
require('cnx.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["password"];
    $num = $_POST["tel"];
    $profession = $_POST["profession"];
    $adresse = $_POST["adresse"];
    try {
        $sql = 'INSERT INTO Utilisateur (nom, prenom, email, mdp, num, profession, adresse) VALUES (:nom, :prenom, :email, :mdp, :num, :profession, :adresse)';
        $req = $cnx->prepare($sql);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':email', $email);
        $req->bindParam(':mdp', $mdp);
        $req->bindParam(':num', $num);
        $req->bindParam(':profession', $profession);
        $req->bindParam(':adresse', $adresse);

        $req->execute();
        echo 'Inscription réussie !';
        header("Location: inscription_reussie.php"); 
    } catch (PDOException $e) {
        echo 'Erreur :' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addIdea.css">
    <title>Inscription</title>
</head>

<body>
    <p><a href="login.php"> Retourner à la page connexion</a></p>
    <div class="container">
        <h1>Inscription</h1>
        <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <label for="nom">Nom : </label>
            <input type="text" id="nom" name="nom" required>
            <label for="prenom">Prenom : </label>
            <input type="text" id="prenom" name="prenom" required>
            <label for="email">Adresse email : </label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe : </label>
            <input type="password" id="password" name="password" required>
            <label for="tel">Numéro téléphone : </label>
            <input type="tel" id="tel" name="tel" required>
            <label for="adresse">Adresse : </label>
            <input type="text" id="adresse" name="adresse">
            <label for="profession">Profession : </label>
            <input type="text" id="profession" name="profession">
            <input type="submit" value="S'inscrire">
        </form>
        
    </div>
</body>

</html>