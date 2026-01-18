<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Ajouter une composition</title>
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
    <h1>Ajouter une Composition</h1>
    <form action="../controleur/AjouterComposition.php" method="post">

        Désignation : <input type="text" name="designation"/>
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
