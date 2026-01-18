<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include_once('../modele/dao/DaoJouer.php');
include_once('../modele/dao/DaoJoueur.php');

$daoJouer = new DaoJouer();
$daoJoueur = new DaoJoueur();

$idRencontre = $_POST['idRencontreCompo'];

if (isset($_POST['joueur'])) {
    $idJoueur = $_POST['joueur'];
    $joueur = $daoJoueur->findById($idJoueur);
    if (!$daoJouer->joueurJoueMatch($idJoueur, $idRencontre)) {
        $newJouer = new Jouer(0, $idRencontre, $joueur, "Poste", true, 5);
        $daoJouer->create($newJouer);
    }
}

header('Location: ../vue/GestionComposition.php?idRencontreCompo=' . urlencode($idRencontre));
?>