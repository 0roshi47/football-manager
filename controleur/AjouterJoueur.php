<?php

if (empty($_POST['nom'])
    || empty($_POST['prenom'])
    || empty($_POST['naissance'])
    || empty($_POST['taille'])
    || empty($_POST['poids'])
    || empty($_POST['phone'])) {
    header('Location: ../vue/AjouterJoueurFormulaire.php');
    exit;
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$naissance = $_POST['naissance'];
$taille = $_POST['taille'];
$poids = $_POST['poids'];
$phone = $_POST['phone'];

if (!is_int($taille) || !is_int($poids)) {
    header('Location: ../vue/AjouterJoueurFormulaire.php');
    exit;
}

$dateNaissance = DateTime::createFromFormat('d/m/Y', $naissance);

if ($dateNaissance === false) { //la date n'a pas été converti correctement
    header('Location: ../vue/AjouterJoueurFormulaire.php');
    exit;
}

$dateNaissanceOutput = $dateNaissance->format('Y-m-d');



?>

