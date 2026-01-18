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
    <a href="GestionRencontre.php"><button class="button-default">← Retour</button></a>
    <?php
    include "../modele/dao/DaoRencontre.php";
    // Affichage des erreurs (à garder en dev)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $daoR = new DaoRencontre(); 
    $rencontre = $daoR->findById($_POST['idRencontreRes'])?>
    <form action="../controleur/SaisirResultats.php" method="post">

        Score du club : <input type="number" name="scoreEquipe"><br>
        Score de l'adversaire : <input type="number" name="scoreAdversaire">
        <input type="hidden" value=<?=$rencontre->getIdRencontre()?> name="idRencontreRes">
        <input type="submit" value="Enregistrer" class="button-default">
        <input type="reset" value="Réinitialiser" class="button-default">
    </form>
</body>

</html>