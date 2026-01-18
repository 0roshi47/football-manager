<?php

require_once '../modele/Joueur.php';
require_once '../modele/dao/DaoJoueur.php';

if (empty($_POST['nom'])
    || empty($_POST['prenom'])
    || empty($_POST['naissance'])
    || empty($_POST['taille'])
    || empty($_POST['poids'])
    || empty($_POST['license'])) {
    header('Location: ../vue/AjouterJoueurFormulaire.php');
    exit;
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$naissance = $_POST['naissance'];
$taille = $_POST['taille'];
$poids = $_POST['poids'];
$license = $_POST['license'];
$statut = $_POST['statut'];

$dateNaissance = DateTime::createFromFormat('Y-m-d', $naissance); //format saisie standard saisi par l'utilisateur

if ($dateNaissance === false) { //la date n'a pas été converti correctement (format incorrect)
    header('Location: ../vue/AjouterJoueurFormulaire.php');
    exit;
}

$dateNaissance = $dateNaissance->format('Y-m-d'); //format stockée en bd

$newJoueur = new Joueur(0, $license, $nom, $prenom, new DateTimeImmutable($dateNaissance), $statut, $poids, $taille);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$dao = new DaoJoueur();

try {
    $dao->create($newJoueur);
} catch (Exception $e) { //erreur dans l'ajout du joueur en bd
    header('Location: ../vue/AjouterJoueurFormulaire.php');
    exit;
}

header('Location: ../vue/GestionJoueur.php'); //le joueur a été ajouté, l'utilisateur est redirigé sur la page gestion

?>

