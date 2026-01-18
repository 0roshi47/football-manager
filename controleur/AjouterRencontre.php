<?php

if (empty($_POST['dateHeure'])
    || empty($_POST['adversaire'])
    || empty($_POST['lieu'])) {
    header('Location: ../vue/AjouterRencontreFormulaire.php');
    exit;
}

$dateHeure = $_POST['dateHeure'];
$adversaire = $_POST['adversaire'];
$lieu = $_POST['lieu'];

if ($dateHeure === false) { //la date n'a pas été converti correctement
    header('Location: ../vue/AjouterRencontreFormulaire.php');
    exit;
}

//$newRencontre = new Rencontre(idRencontre: 0, dateHeure: $dateHeure, adversaire: $adversaire, lieu: $lieu, resultat: NULL);
header('Location:../vue/GestionRencontre.php');
?>

