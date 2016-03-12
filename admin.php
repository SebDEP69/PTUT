<?php
session_start();
      if (($_SESSION['pseudo'])=="Vincent") {
          
          // On est certain de pouvoir y accéder ici
      } else {
          header('Location:compte.php');
      }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Carte des menus</title>
        <meta charset="UTF-8 without BOM">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="bloc-page">
            <div id="header">
                            <p>Rest'Online</p>
            </div>
            <ul id="menu">
                            <li><a href="../index.php">Accueil</a></li>
                                <li><a href="ajout_carte.php">Gestion menus</a></li>
                                <li><a href="ajout_plat.php">Gestion plats</a></li>
                                <li><a href="affiche_res.php">Gestion Réservation</a></li>
                                <li><a href="deconnexionAdmin.php">Déconnexion</a></li>
			      </ul>
     
            <p> <h1>Bienvenue sur la page Adminisrateur.</h1><br />
            Si vous n'êtes pas Vincent veuillez quitter immédiatement cette page.<br />
            Merci d'avance.  </br>
            <br />
            <img id ="dbt2" src="../image/acces.jpg" /*alt="Image Accès sécurisé" />
            <br /><br />
            Ici vous pouvez gérer les menus, les plats et les réservations.<br />
            
        </div>
    </body>
</html>
