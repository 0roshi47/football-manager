<?php
    include "../modele/dao/DaoRencontre.php";
    $daoR = new DaoRencontre();
    $daoR->deleteById($_POST['idRencontre']);
    header('Location:../vue/GestionRencontre.php');
    ?>