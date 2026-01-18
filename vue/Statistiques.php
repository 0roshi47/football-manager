<?php
require_once '../modele/dao/DaoRencontre.php';

// Vérification session
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}

// Instanciation du DAO
$daoR = new DaoRencontre();
$matchs = $daoR->findAll();

// Initialisation des compteurs
$gagnes = 0;
$perdus = 0;
$nuls = 0;

foreach ($matchs as $match) {
    $resultat = $match->getResultat();

    if ($resultat === "") continue; // Ignorer les matchs à venir

    // On suppose que le format est "Equipe1 - Equipe2 X-Y" ou "3-1"
    // Ici, imaginons que "notre équipe" est l'équipe domicile
    // Si tu as stocké un champ 'scoreEquipe' ou 'scoreAdverse', adapte
    // Pour simplifier, on assume un champ résultat de type "3-1" pour domicile
    list($scoreEquipe, $scoreAdverse) = explode('-', $resultat);

    $scoreEquipe = (int)$scoreEquipe;
    $scoreAdverse = (int)$scoreAdverse;

    if ($scoreEquipe > $scoreAdverse) $gagnes++;
    elseif ($scoreEquipe < $scoreAdverse) $perdus++;
    else $nuls++;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statistiques</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <h1>Statistiques de l'équipe</h1>

    <div class="stats-container">
        <div class="stat-box" style="background-color: #4CAF50; color: white;">
            <h2><?= $gagnes ?></h2>
            <p>Gagnés</p>
        </div>
        <div class="stat-box" style="background-color: #F44336; color: white;">
            <h2><?= $perdus ?></h2>
            <p>Perdus</p>
        </div>
        <div class="stat-box" style="background-color: #FFC107; color: white;">
            <h2><?= $nuls ?></h2>
            <p>Nuls</p>
        </div>
    </div>

</body>
</html>
