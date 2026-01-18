<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Modifier une rencontre</title>

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
    $rencontre = $daoR->findById($_POST['idRencontreMod']);
    ?>
    <h1>Modifier une rencontre</h1>
    <form action="../controleur/ModifierRencontre.php" method="post">

        Date et Heure : <input type="datetime-local" name="dateHeure"
            value="<?= $rencontre->getDateHeure()->format('Y-m-d\TH:i') ?>" />
        Adversaire : <input type="text" name="adversaire" value="<?= $rencontre->getAdversaire()?>" />
        <select class="border-radius-5px_width-100px" name="lieu"?>>
            <!--valeur par défaut-->
            <option value=""> Lieu</option>

            <option value="Domicile" <?= $rencontre->getLieu() === 'Domicile' ? 'selected' : '' ?>>
                Domicile
            </option>
            <option value="Exterieur" <?= $rencontre->getLieu() === 'Exterieur' ? 'selected' : '' ?>>
                Extérieur
            </option>
        </select>

        <input type="hidden" value=<?=$_POST['idRencontreMod']?> name="idRencontre"/>
        <input type="reset" value="Réinitialiser" />
        <input type="submit" value="Valider" />
    </form>
</body>

</html>