<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
  <title>Accueil </title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
    <nav  class="navbar">
        <ul>
            <li><a href="Accueil.php">Accueil</a></li>
            <li><a href="GestionRencontre.html">Rencontre</a></li>
            <li><a href="GestionJoueur.php">Joueurs</a></li>
            <li><a href="GestionComposition.html">Composition</a></li>
        </ul>
    </nav>
    <h1>Bonjour $user</h1>
    <div >
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
 