<?php
session_start();
if (isset($_SESSION['Vincent'])) {
    session_destroy (); 
    // On est certain de pouvoir y accéder ici
} else {
    header('Location:compte.php');
}
?>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="../css/style.css">
        <meta charset="utf-8 without BOM" />
		<title>Rest'Online</title>
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
                        
			<div id="bvn">
				<h1>Vous avez été déconnecté.</h1>
			</div>
			<div id="footer">
			     <a href="../index.php">Reconnexion</a>
			</div>     
		</div>
	</body>
</html>