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

    if ($resultat === "" || strpos($resultat, '-') === false) continue;

    $parts = explode('-', $resultat);
    if (count($parts) !== 2) continue;

    $scoreEquipe = (int)$parts[0];
    $scoreAdverse = (int)$parts[1];

    if ($scoreEquipe > $scoreAdverse) $gagnes++;
    elseif ($scoreEquipe < $scoreAdverse) $perdus++;
    else $nuls++;
}

// Calcul des pourcentages
$total = $gagnes + $perdus + $nuls;

if ($total > 0) {
    $pctGagnes = round(($gagnes / $total) * 100, 1);
    $pctPerdus = round(($perdus / $total) * 100, 1);
    $pctNuls   = round(($nuls   / $total) * 100, 1);
} else {
    $pctGagnes = $pctPerdus = $pctNuls = 0;
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
    <?php include 'navbar.php'; ?>
    <h1>Statistiques de l'équipe</h1>

    <div class="stats-container">
        <div class="stat-box" style="background-color: #4CAF50; color: white;">
            <h2><?= $gagnes ?></h2>
            <p>Matchs Gagnés</p>
            <small><?= $pctGagnes ?> %</small>
        </div>

        <div class="stat-box" style="background-color: #F44336; color: white;">
            <h2><?= $perdus ?></h2>
            <p>Matchs Perdus</p>
            <small><?= $pctPerdus ?> %</small>
        </div>

        <div class="stat-box" style="background-color: #FFC107; color: white;">
            <h2><?= $nuls ?></h2>
            <p>Matchs Nuls</p>
            <small><?= $pctNuls ?> %</small>
        </div>
    </div>

</body>
</html>
