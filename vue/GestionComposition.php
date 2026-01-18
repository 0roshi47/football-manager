<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Gestion des Compositions</title>
    </head>
    <body>
        <?php
        if (!session_status() == PHP_SESSION_ACTIVE) {
            header('Location: ../index.php');
            exit;
        }
        ?>
        <?php include 'navbar.php'; ?>
        <div>
        <a href="AjouterCompoFormulaire.php"><button class="button-default">Nouvelle composition</button></a>
     </div>
        Gestion des composiition
    </body>
</html>