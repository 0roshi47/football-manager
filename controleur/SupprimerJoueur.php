<?php
    include "../modele/dao/DaoJoueur.php";
    $daoJ = new DaoJoueur();
    $daoJ->deleteById($_POST['idJoueur']);
    header('Location:../vue/GestionJoueur.php');
?>