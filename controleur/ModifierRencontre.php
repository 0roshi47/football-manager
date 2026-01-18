<?php
    include "../modele/dao/DaoRencontre.php";
    $daoR = new DaoRencontre();
    $nouvelleHeure = new DateTime($_POST['dateHeure']);
    $nouvelleRencontre = new Rencontre($_POST['idRencontre'], $nouvelleHeure, $_POST['adversaire'], $_POST['lieu'], "");
    $daoR->update($nouvelleRencontre);
    header('Location:../vue/GestionRencontre.php');
?>