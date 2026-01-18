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
        <div> <select class="border-radius-5px_width-100px" name="Tris">
            <option value="">Tri</option>
            <option value="dateAsc">Date croissant</option>
            <option value="dateDesc">Date décroissante</option>
            <option value="lieu">Lieu</option>
            </select> 
            <a href="AjouterRencontreFormulaire.php"><button class="button-default">Ajouter une rencontre</button></a>
         </div>
        Gestion des rencontres
    </body>
    
</html>