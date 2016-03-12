<?php
session_start();
if (isset($_SESSION['id'])) {
    
    // On est certain de pouvoir y accéder ici
} else {
    header('Location:page/compte.php');
}
?>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8 without BOM" />
		<title>Rest'Online</title>
    </head>

	<body>
		<div id="bloc-page">
                        <div id="header">
                            <p>Rest'Online</p>
                        </div>
                            <ul id="menu">
                                <li><a href="index.php">Accueil</a></li>
                                <li><a href="page/carte.php">Carte des menus</a></li>
                                <li><a href="page/ajout_res.php">Réservation</a></li>
                                <li><a href="page/deconnexion.php">Déconnexion</a></li>

                            </ul>
                        
			<div id="bvn">
				<p> <h1>Bienvenue sur Rest'Online <?php echo $_SESSION['pseudo']; ?>! </h1>
				<br>Ce site vous permet de commander et réserver facilement dans votre restaurant préféré!
				<br>Bon appétit :)</p>
			</div>
			
			<div id ="article2">
				<tableA>
						<tr>
							<td ><img id="dbt" src="image/gratin.jpg" alt = "Photo 1"></td>
							<td ><img id="dbt" src="image/steak.jpg" alt = "Photo 2"></td>
							<td ><img id="dbt" src="image/crevette.jpg" alt = "Photo 3"></td>
						</tr>
						
						<tr> 
							<td ><img id="dbt" src="image/magret.jpg" alt="Photo 4"></td>
							<td ><img id="dbt" src="image/boeuf.jpg" alt="Photo 5"></td>
							<td ><img id="dbt" src="image/imagemenu.jpg" alt="Photo 6"></td>
						</tr>
						
						<tr> 
							<td ><img id="dbt" src="image/dessert.jpg" alt="Photo 7"></td>
						</tr>			
					</tableA>
			</div>
			<div id="aside2">
				<p><h3> Nouveautés:</h3>
				<br>
				<br>Votre restaurant préféré fait peau neuve!
				<br>A la carte: de nouveaux menus, de nouvelles options, un compte fidélité...
				<br>
				<br>Rest'Online vous suit partout ! 
				<br>Il s'installera très prochainement sur vos smartphones et tablettes afin que vous puissiez venir manger sans perdre de temps
				</p>
			</div>
			<div id="footer">
			     <a href="page/admin.php">Admin</a>
			</div>     
		</div>
	</body>
</html>