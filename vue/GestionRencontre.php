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
    <?php
    include "../modele/dao/DaoRencontre.php";
    // Affichage des erreurs (à garder en dev)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $daoR = new DaoRencontre();

    // Récupération de tout les joueurs
    $req = $daoR->findAll();
    ?>
    <div> <select class="border-radius-5px_width-100px" name="Tris">
            <option value="">Tri</option>
            <option value="dateAsc">Date croissant</option>
            <option value="dateDesc">Date décroissante</option>
            <option value="lieu">Lieu</option>
        </select>
        <a href="AjouterRencontreFormulaire.php"><button class="button-default">Ajouter une rencontre</button></a>
    </div>
    <table class="tableau">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Heure</th>
                <th scope="col">Adversaire</th>
                <th scope="col">Lieu</th>
                <th scope="col">Resultat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($req as $row): ?>
                    <tr>
                        <td><?= $row->getDateHeure()->format('d/m/Y') ?></td>
                        <td><?= $row->getDateHeure()->format('H:i') ?></td>
                        <td><?= $row->getAdversaire() ?></td>
                        <td><?= $row->getLieu() ?></td>
                        <?php if($row->getResultat()=="") {
                                echo('
                                    <td>A venir</td>
                                    <td>
                                        <form action="../controleur/SupprimerRencontre.php" method="post">
                                            <input type="hidden" value='.$row->getIdRencontre().'name="idRencontre">
                                            <input type="submit" value="Supprimer" class="button-default">
                                        </form>
                                    </td>');
                            } else {echo('<td>'.$row->getResultat().'</td>');}
                        ?>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>