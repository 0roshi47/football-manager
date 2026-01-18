<?php

require_once '../modele/Rencontre.php';
require_once '../modele/dao/DaoRencontre.php';

if (empty($_POST['dateHeure'])
    || empty($_POST['adversaire'])
    || empty($_POST['lieu'])) {
    header('Location: ../vue/AjouterRencontreFormulaire.php');
    exit;
}

if ($_POST['lieu'] === 'Lieu') {
    header('Location: ../vue/AjouterRencontreFormulaire.php');
    exit;
}



$adversaire = $_POST['adversaire'];
$lieu = $_POST['lieu'];

$dateHeure = DateTime::createFromFormat('Y-m-d\TH:i', $_POST['dateHeure']);

if ($dateHeure === false) {
    header('Location: ../vue/AjouterRencontreFormulaire.php');
    exit;
}

$now = new DateTime();

if ($dateHeure < $now) {
    header('Location: ../vue/AjouterRencontreFormulaire.php');
    exit;
}

$newRencontre = new Rencontre(0, $dateHeure, $adversaire, $lieu, '');

$dao = new DaoRencontre();

try {
    $dao->create($newRencontre);
} catch (Exception $e) { //erreur dans l'ajout de la rencontre en bd
    header('Location: ../vue/AjouterRencontreFormulaire.php');
    exit;
}

header('Location:../vue/GestionRencontre.php');
?>

