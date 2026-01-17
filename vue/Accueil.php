<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        if (!session_status() == PHP_SESSION_ACTIVE) {
            header('Location: ../index.php');
            exit;
        }
    ?>
    <?php include 'navbar.php'; ?>
    <h1>Bonjour $user</h1>
    <div>
        <h3>Matchs à venir</h3>
        <table class="tableau">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Heure</th>
                    <th scope="col">Adversaire</th>
                    <th scope="col">Lieu</th>
                </tr>
            </thead>
        </table>
    </div>
    <div>
        <a href="GestionRencontre.html"><button class="button-default">Gérer les matchs</button></a>
        <a href="GestionJoueur.php"><button class="button-default">Gérer les joueurs</button></a>
        <a href="GestionComposition.html"><button class="button-default">Gérer les compositions</button></a>
    </div>


</body>
</html>
 