<?php
    include "../modele/dao/DaoJoueur.php";
    include "../modele/Commentaire.php";
    $daoJ = new DaoJoueur();
    $joueur = $daoJ->findById($_POST['idJoueurMod']);
    $commentaire = new Commentaire(count($joueur->getCommentaire()), $_POST['commentaire']);
    echo($commentaire->getIdCommentaire().$commentaire->getTexte());
    $joueur->ajouterCommentaire($commentaire);
    header('Location:../vue/InfosJoueur.php?id='.$_POST['idJoueurMod']);
?>