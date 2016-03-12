<?php
session_start();
if (isset($_SESSION['id'])) {
    session_destroy (); 
    // On est certain de pouvoir y accéder ici
} else {
    header('Location:page/compte.php');
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
                                <li><a href="carte.php">Carte des menus</a></li>
                                <li><a href="ajout_res.php">Réservation</a></li>
                                <li><a href="deconnexion.php">Déconnexion</a></li>

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