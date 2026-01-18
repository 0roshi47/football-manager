<?php
    include "../modele/dao/DaoRencontre.php";
    $daoR = new DaoRencontre();
    $nouvelleRencontre = $daoR->findById($_POST['idRencontreRes']);
    $nouvelleRencontre->setResultat($_POST['scoreEquipe']."-".$_POST['scoreAdversaire']);
    $daoR->update($nouvelleRencontre);
    header('Location:../vue/GestionRencontre.php');
?>