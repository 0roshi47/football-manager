<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Gestion des Compositions</title>
    </head>
    <body>
        <?php

        include_once('../modele/Composition.php');

        if (!session_status() == PHP_SESSION_ACTIVE) {
            header('Location: ../index.php');
            exit;
        }

        $idRencontre = $_POST['idRencontre'];

        // $composition

        include 'navbar.php';
        ?>

        Gestion des composiition



    </body>
</html>