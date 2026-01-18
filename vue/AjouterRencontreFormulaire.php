<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Ajouter une rencontre</title>
    <link rel="stylesheet" href="style.css" />
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
    <h1>Ajouter une rencontre</h1>
    <form action="../controleur/AjouterRencontre.php" method="post">

        Date et Heure : <input type="datetime-local" name="dateHeure" min="<?= date('Y-m-d\TH:i') ?>"/>
        Adversaire : <input type="text" name="adversaire"/>
        <select class="border-radius-5px_width-100px" name="lieu">
            <option value=""> Lieu</option><!--valeur par défaut-->
            <option value="Domicile">Domicile</option>
            <option value="Exterieur">Exterieur</option>
        </select>

      <input type="reset" value="Réinitialiser" />
      <input type="submit" value="Valider" />
    </form>
  </body>
</html>
