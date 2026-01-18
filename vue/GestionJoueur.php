<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Gestion des Joueurs</title>
    <link rel="stylesheet" href="style.css">
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
        <a href="AjouterJoueurFormulaire.php"><button class="button-default">Ajouter un joueur</button></a>
    </div>
    <?php
    include "../modele/dao/DaoJoueur.php";
    // Affichage des erreurs
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $daoJ = new DaoJoueur();

    // Récupération de tout les joueurs
    $req = $daoJ->findAll();
    ?>

    <div class="display-flex_justify-content">
        <?php foreach ($req as $row): ?>
            <a href="InfosJoueur.php?id=<?= $row->getIdJoueur() ?>">
                <div id="carte-joueur">
                    <img src="./images/icon-placeholder.jpg" alt="icone de joueur">

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
                    <form action="../controleur/SupprimerJoueur.php" method="post">
                        <input type="hidden" value=<?= $row->getIdJoueur() ?> name="idJoueur">
                        <input type="submit" value="Supprimer" class="button-default">
                    </form>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</body>

</html>