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

    $daoJ = new DaoJoueur();
    $joueur = $daoJ->findById($_POST['idJoueur']);

    if ($joueur == null) {
        header('Location: InfosJoueur.php');
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
            </div>
            <div>
                <h2>Commentaire :</h2>
                <form action="../controleur/AjouterCommentaire.php" method="post">
                    <input type="text" name="commentaire"><br>
                    <input type="hidden" name="idJoueurMod" value=<?=$joueur->getIdJoueur()?>>
                    <input type="submit" value="Enregistrer" class="button-default">
                </form>


            </div>
        </div>
    </div>
</body>