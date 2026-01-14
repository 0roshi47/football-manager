<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Gestion des Joueurs</title>
    <link rel="stylesheet" href="../vue/style.css">
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="Accueil.php">Accueil</a></li>
            <li><a href="GestionRencontre.html">Rencontre</a></li>
            <li><a href="GestionJoueur.html">Joueurs</a></li>
            <li><a href="GestionComposition.html">Composition</a></li>
        </ul>
    </nav>
    <div> <select class="select-default" name="Tris">
            <option value="">Tri</option>
            <option value="Alpha">Ordre alphabétique</option>
            <option value="noteAsc">Note croissante</option>
            <option value="notDesc"> Note décroissante</option>
        </select> <a href="AjouterJoueur.html"><button class="button-default">Ajouter un joueur</button></a> </div>
    <div class="container-cartes"></div>
    <?php
    include "../modele/dao/DaoJoueur.php";
    // Affichage des erreurs (à garder en dev)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Connexion PDO
    $dao = new DaoJoueur();

    // Requête pour récupérer les joueurs
    $req = $dao->findAll();
    ?>

    <div class="container-cartes">
        <?php foreach ($req as $row): ?>
            <div class="carte-joueur">
                <img src="./images/icon-placeholder.jpg" alt="icone de joueur">

                <ul class="infos-joueur">
                    <li>Nom :
                        <?= htmlspecialchars($row->getNom()) ?>
                    </li>
                    <li>Prénom :
                        <?= htmlspecialchars($row->getPrenom()) ?>
                    </li>
                    <li>Naissance :
                        <?= $row->getNaissance()->format("d/m/Y") ?>
                    </li>
                    <li>Licence :
                        <?= htmlspecialchars($row->getLicence()) ?>
                    </li>
                </ul>

                <select class="select-statut" name="status">
                    <option value="">Statut</option>
                    <option value="Actif">Actif</option>
                    <option value="Blesse">Blessé</option>
                    <option value="Suspendu">Suspendu</option>
                    <option value="Absent">Absent</option>
                </select>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>