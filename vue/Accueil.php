<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
  <title>Accueil </title>
  <link rel="stylesheet" href="style.css">

</head>
<body>

    <?php
    echo "Hello World";
    MariaDBDataSource::getConnexion();
    ?>

    <h1>Bonjour $user</h1>
    <div >
        <table class="tableau">
            <caption>
                
            </caption>
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
        <button class="button-default">Gérer les matchs</button>
         <a href="GestionJoueur.html"><button class="button-default">Gérer les joueurs</button></a>
        <button class="button-default">Gérer les compositions</button>
    </div>

</body>
</html>
 