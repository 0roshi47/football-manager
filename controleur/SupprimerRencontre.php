<?php
    include "../modele/dao/DaoRencontre.php";
    $daoR = new DaoRencontre();
    $daoR->deleteById($_POST['idRencontreSuppr']);
    header('Location:../vue/GestionRencontre.php');
?>