<?php
require('cnx.php');
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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Bienvenue sur la plateforme de boîte à Idées Collaborative</h1>
    <div class="box">
        <h2>Connexion</h2>
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Appeler la fonction de connexion
            if (connexion($cnx, $email, $password)) {
                header("Location: index.php"); 
                exit();
            } else {
                echo "Adresse email ou mot de passe incorrect."; 
            }
        } 
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="Votre adresse email">
            </div>
            <div class="group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe">
            </div>
            <button type="submit">Se Connecter</button>
        </form>
        <p>Vous n'avez pas de compte, veuillez s'incrire <a href="inscription.php">ici</a></p>
    </div>
</body>
</html>
