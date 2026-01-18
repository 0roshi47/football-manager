<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Gestion des Compositions</title>
    </head>
    <body>
        <?php

        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);

        include_once('../modele/dao/DaoJouer.php');
        include_once('../modele/dao/DaoJoueur.php');

        if (!session_status() == PHP_SESSION_ACTIVE) {
            header('Location: ../index.php');
            exit;
        }

        $daoJouer = new DaoJouer();

        $idRencontre = $_POST['idRencontreCompo'];

        // echo $idRencontre;


        $participations = $daoJouer->findByRencontre($idRencontre);

        include 'navbar.php';
        ?>

        Gestion des composition

        <form action="GestionComposition.php" method="post">

        Ajouter 
          <select name="statut">
          <option value="Actif">Actif</option>
          <option value="Blesse">Blessé</option>
          <option value="Suspendu">Suspendu</option>
          <option value="Absent">Absent</option>
          </select>

      <input type="submit" value="Valider" />
    </form>

    </body>
</html>