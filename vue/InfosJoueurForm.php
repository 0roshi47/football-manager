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
                        <form action="../controleur/ModifierJoueur.php" method="post">
                            <li>Nom : <input type="text" name="nom" value=<?= $joueur->getNom() ?> /></li>
                            <li>Prénom : <input type="text" name="prenom" value=<?= $joueur->getPrenom() ?> /></li>
                            <li>Date de naissance : <input class="border-radius-5px_width-100px" type="date" name="naissance"
                                value="<?= $joueur->getNaissance()->format('Y-m-d') ?>" /></li>
                            <li>Statut : 
                                <select name="statut" class="border-radius-5px_width-100px ">
                                    <option value=""> Statut</option>

                                    <option value="Actif" <?= $joueur->getStatut() === 'Actif' ? 'selected' : '' ?>>
                                        Actif
                                    </option>
                                    <option value="Blessé" <?= $joueur->getStatut() === 'Blessé' ? 'selected' : '' ?>>
                                        Blessé
                                    </option>
                                    <option value="Suspendu" <?= $joueur->getStatut() === 'Suspendu' ? 'selected' : '' ?>>
                                        Suspendu
                                    </option>
                                    <option value="Absent" <?= $joueur->getStatut() === 'Absent' ? 'selected' : '' ?>>
                                        Absent
                                    </option>
                                </select>
                            </li>
                            <li>Poids : <input type="number" name="poids" value=<?= $joueur->getPoids() ?> /> kg</li>
                            <li>Taille : <input type="text" name="taille" value=<?= $joueur->getTaille() ?> /> cm</li>
                            <li>Licence : <input type="text" name="licence" value=<?= $joueur->getLicence() ?> /></li>
                            <input type="hidden" value=<?=$joueur->getIdJoueur()?> name="idJoueurMod">
                            <input type="submit" value="Enregistrer" class="button-default">
                        </form>
                    </ul>
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