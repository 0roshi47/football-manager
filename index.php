<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vue/style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="dead-center">
        <div id="auth">
            <form action="controleur/Authentification.php" method="post">
                <p>Identifiant : </p><input type="text" name="identifiant"><br />
                <p>Mot de passe : </p><input type="password" name="mot_de_passe"><br />
                <input type="submit" value="Se connecter">
            </form>
        </div>
    </div>
</body>
</html>