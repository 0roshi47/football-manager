<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Details du joueur</title>

</head>

<body>
    <?php
    include "../modele/dao/DaoJoueur.php";
    if (!session_status() == PHP_SESSION_ACTIVE) {
        header('Location: ../index.php');
        exit;
    }
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        header('Location: GestionJoueur.php');
        exit;
    }

    $daoJ = new DaoJoueur();
    $joueur = $daoJ->findById($_GET['id']);

    if ($joueur == null) {
        header('Location: GestionJoueur.php');
        exit;
    }
    // $commentaires = $joueur->getCommentaire();
    
    ?>
    <?php include 'navbar.php'; ?>
    <a href="GestionJoueur.php"><button class="button-default">← Retour</button></a>
    <div class="div_flex_border-radius_blue-bg">
        <img src="./images/icon-placeholder.jpg" alt="icone de joueur" id="icone-joueur-grand">
        <div class="div_solid-border-radius">
            <div class="display-flex_justify-content">
                <div>
                    <ul class="list-no-style">
                        <li>Nom : <?= $joueur->getNom() ?></li>
                        <li>Prénom : <?= $joueur->getPrenom() ?></li>
                        <li>Date de naissance : <?= $joueur->getNaissance()->format('d/m/Y') ?></li>
                        <li>Statut : <?= $joueur->getStatut() ?></li>
                        <li>Poids : <?= $joueur->getPoids() ?> kg</li>
                        <li>Taille : <?= $joueur->getTaille() ?> cm </li>
                        <li>Licence : <?= $joueur->getLicence() ?></li>
                    </ul>

                </div>
                <div>
                    <form action="InfosJoueurForm.php" method="post">
                        <input type="hidden" value=<?=$joueur->getIdJoueur()?> name="idJoueur">
                        <input type="submit" value="Modifier" class="button-default">
                    </form>
                </div>
            </div>
            <div>
                <h2>Commentaire :</h2>
                <?php //if (empty($commentaires)) {
                // echo('<p>Aucun commentaire pour le moment</p>');
                //} else {
                //  foreach ($commentaires as $com) {
                //echo('<p>'.$com->getTexte().'</p>');
                //  }
                
                //} ?>


            </div>
        </div>
    </div>
</body>