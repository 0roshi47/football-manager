<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil </title>
    <link rel="stylesheet" href="vue/style.css">
</head>

<body>
    <nav  class="navbar">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="vue/GestionRencontre.html">Rencontre</a></li>
            <li><a href="vue/GestionJoueur.php">Joueurs</a></li>
            <li><a href="vue/GestionComposition.html">Composition</a></li>
        </ul>
    </nav>
    <h1>Bonjour $user</h1>
    <div >
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
        <a href="vue/GestionRencontre.html"><button class="button-default">Gérer les matchs</button></a>
        <a href="vue/GestionJoueur.php"><button class="button-default">Gérer les joueurs</button></a>
        <a href="vue/GestionComposition.html"><button class="button-default">Gérer les compositions</button></a>
    </div>


</body>
</html>
 