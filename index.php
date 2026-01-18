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
        <form action="controleur/Authentification.php" method="post">
            Identifiant : <input type="text" name="identifiant"><br />
            Mot de passe : <input type="text" name="mot_de_passe"><br />
            <input type="submit" value="OK">
        </form>
    </div>
</body>
</html>