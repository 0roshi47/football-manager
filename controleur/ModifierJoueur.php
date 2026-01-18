<?php
    include "../modele/dao/DaoJoueur.php";
    $daoJ = new DaoJoueur();
    $nouvelleDate = new DateTimeImmutable($_POST['naissance']);
    $nouvelleJoueur = new Joueur($_POST['idJoueurMod'], $_POST['licence'],
                                 $_POST['nom'], $_POST['prenom'], $nouvelleDate, $_POST['statut'],
                                 $_POST['poids'], $_POST['taille']);
    $daoJ->update($nouvelleJoueur);
    header('Location:../vue/InfosJoueur.php?id='.$_POST['idJoueurMod']);
?>