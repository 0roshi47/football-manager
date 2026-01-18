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
        $daoJoueur = new DaoJoueur();

        $idRencontre = $_POST['idRencontreCompo'];

        // echo $idRencontre;

        if (isset($_POST['joueur'])) {
            $idJoueur = $_POST['joueur'];
            $joueur = $daoJoueur->findById($idJoueur);
            $newJouer = new Jouer(0, $idRencontre, $joueur, "Poste", true, 5);
            $daoJouer->create($newJouer);
        }

        $participations = $daoJouer->findByRencontre($idRencontre);

        $joueursDispo = $daoJoueur->findAll();
        $joueursDansComposition = array();

        foreach ($participations as $participationJoueur) {
            array_push($joueursDansComposition, $participationJoueur->getJoueur());
        }

        var_dump($joueursDansComposition);

        include 'navbar.php';
        ?>

        Gestion des composition

        <?php foreach ($joueursDansComposition as $row): ?>
            <div id="carte-joueur">
                <!-- <img src="./images/icon-placeholder.jpg" alt="icone de joueur"> -->

                <ul class="list-no-style">
                    <li>Nom :
                        <?= $row->getNom() ?>
                    </li>
                    <li>Prénom :
                        <?= $row->getPrenom() ?>
                    </li>
                    <li>Naissance :
                        <?= $row->getNaissance()->format("d/m/Y") ?>
                    </li>
                    <li>Licence :
                        <?= $row->getLicence() ?>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>

        <form action="GestionComposition.php" method="post">
            Ajouter 
            <select name="joueur">
                <?php foreach ($joueursDispo as $joueur): ?>
                    <option value='<?= $joueur->getIdJoueur() ?>'><?= $joueur->getNom() ?></option>
                <?php endforeach; ?>

            </select>
            
        <input type="hidden" value=<?=$idRencontre?> name="idRencontreCompo">
      <input type="submit" value="Valider" />
    </form>

    </body>
</html>