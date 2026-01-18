<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Gestion des rencontres</title>

</head>

<body>
    <?php
    if (!session_status() == PHP_SESSION_ACTIVE) {
        header('Location: ../index.php');
        exit;
    }
    ?>
    <?php include 'navbar.php'; ?>
    <a href="GestionJoueur.php"><button class="button-default">← Retour</button></a>
    <div class="display-flex">
        <img src="./images/icon-placeholder.jpg" alt="icone de joueur">
        <div class="list-no-style">
            
        </div>
    </div>
</body>