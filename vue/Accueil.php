<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        session_start();
        if (!session_status() == PHP_SESSION_ACTIVE) {
            header('Location: ../index.php');
            exit;
        }
    ?>
    <?php include 'navbar.php';?>
    <?php
    include "../modele/dao/DaoRencontre.php";
    // Affichage des erreurs (à garder en dev)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $daoR = new DaoRencontre();

    // Récupération de tout les joueurs
    $req = $daoR->findAll();
    ?>
    <h1>Bonjour <?=$_SESSION['user']?></h1>
    <div>
        <h3>Matchs à venir</h3>
        <table class="tableau">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Heure</th>
                <th scope="col">Adversaire</th>
                <th scope="col">Lieu</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($req as $row): ?>
                    <?php if ($row->getResultat() == ""):?>
                        <tr>
                            <td><?= $row->getDateHeure()->format('d/m/Y') ?></td>
                            <td><?= $row->getDateHeure()->format('H:i') ?></td>
                            <td><?= $row->getAdversaire() ?></td>
                            <td><?= $row->getLieu() ?></td>
                        </tr>
                    <?php endif;?>
                <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div>
        <a href="GestionRencontre.php"><button class="button-default">Gérer les matchs</button></a>
        <a href="GestionJoueur.php"><button class="button-default">Gérer les joueurs</button></a>
    </div>

</body>
</html>
 