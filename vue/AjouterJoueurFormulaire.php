<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Ajouter un joueur</title>
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
    <a href="GestionJoueur.php"><button class="button-default">← Retour</button></a>
    <h1>Ajouter un joueur</h1>
    <form action="../controleur/AjouterJoueur.php" method="post">

        Nom : <input type="text" name="nom"/>
        Prénom : <input type="text" name="prenom"/>
        Naissance : <input type="date" name="naissance"/>
        Taille : <input type="number" name="taille" min="100" max="250" value="170"/>cm
        Poids : <input type="number" name="poids" min="40" max="150" value="70"/>kilos
        Licence : <input type="text" name="license"/>

      <input type="reset" value="Réinitialiser" />
      <input type="submit" value="Valider" />
    </form>
  </body>
</html>
