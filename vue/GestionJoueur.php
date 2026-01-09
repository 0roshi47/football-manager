<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Gestion des Joueurs</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="Accueil.php">Accueil</a></li>
            <li><a href="GestionRencontre.html">Rencontre</a></li>
            <li><a href="GestionJoueur.php">Joueurs</a></li>
            <li><a href="GestionComposition.html">Composition</a></li>
        </ul>
    </nav>
    <div>
        <select class="select-default" name="Tris">
            <option value="">Tri</option>
            <option value="Alpha">Ordre alphabétique</option>
            <option value="noteAsc">Note croissante</option>
            <option value="notDesc"> Note décroissante</option>
        </select>
        <a href="AjouterJoueur.html"><button class="button-default">Ajouter un joueur</button></a>
    </div>
    <div class="container-cartes">
</div>

    </div>
    <!-- <div class="carte-joueur">
        <img src="./images/icon-placeholder.jpg" alt="icone de joueur">
    </div> -->
    <div class="carte-joueur">
        <img src="./images/icon-placeholder.jpg" alt="icone de joueur">
        <ul class="infos-joueur">
            <li>Nom : Delapampa</li>
            <li>Prenom : Alfredo</li>
            <li>Naissance : 30/02/1995</li>
            <li>Licence : ab-123-cd</li>
        </ul>
        <select class="select-statut" name="Status">
            <option value="">Statut</option>
            <option value="Actif">Actif</option>
            <option value="Blesse">Blessé</option>
            <option value="Suspendu">Suspendu</option>
            <option value="Absent">Absent</option>
        </select>
    </div>
    </div>
</body>

</html>