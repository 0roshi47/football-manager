<?php

const LOGIN = "coach";
const PASSWORD = "mdp";

if (empty($_POST['identifiant']) || empty($_POST['mot_de_passe'])) {
    header('Location: ../index.php');
    exit;
}

$identifiant = $_POST['identifiant'];
$mdp = $_POST['mot_de_passe'];

if (LOGIN == $identifiant && PASSWORD == $mdp) {
    session_start();
    header('Location: ../vue/Accueil.php');
} else {
    header('Location: ../index.php');
}

?>