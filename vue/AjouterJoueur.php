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
    <h1>Ajouter un joueur</h1>
    <form action="ajout_joueur.php" method="post">
      <table>
        <tr>
          Nom :
        </tr>
        <tr>
          <input type="text" name="nom" />
        </tr>
        <tr>
          Prénom :
          <input type="text" name="pnom" /><br />
        </tr>
        Naissance :
        <input type="text" name="naissance" />
        Taille :
        <input type="int" name="taille" />
        Poids :
        <input type="float" name="poids" /><br />
        Licence :
        <input tpe="text" name="phone" /><br />
      </table>

      <input type="reset" value="Réinitialiser" />
      <input type="submit" value="Valider" />
    </form>
  </body>
</html>
