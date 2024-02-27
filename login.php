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
        require('cnx.php');
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
    </div>
</body>
</html>
