<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
  <title>Accueil </title>
  <link rel="stylesheet" href="style.css">

</head>
<body>

    <?php
    require_once '../modele/dao/MariaDBDataSource.php';
    require_once '../modele/dao/DaoJoueur.php';
    // $daoJoueur = new DaoJoueur();
    // $joueur = new DaoJoueur().findById(1);
    // $pdo = new PDO("mysql:host=mysql-liam-valty.alwaysdata.net;port=3306;dbname=liam-valty_football", "442033_football", "A^KM+yN?,~6c+bC");

    // try {
    //     $linkpdo = new PDO("mysql:host=mysql-liam-valty.alwaysdata.net;port=3306;dbname=liam-valty_football", "442033_football", "A^KM+yN?,~6c+bC");
    // } catch(PDOException $e) {
    //     echo "pdo exception";
    // }
    // $joueur = $DaoJoueur()->findById(2);
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
 