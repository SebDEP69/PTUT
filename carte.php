<?php
session_start();
if (isset($_SESSION['id'])) {
   
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
		<script type="text/javascript">
                
                        function open_infos()
                        {
                                window.open('test.html','test','menubar=no, scrollbars=no, top=100, left=100, width=300, height=200');
                        }
                
        </script>
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
      <h1> Voici la liste des menus : </h1>
	  

    <form style="color:white;" method="post" action="carte.php">

   <p>

       <h2> Trier les menus par : </h2>
		<input type="checkbox" name="prix" id="prix" /> <label for="prix">Prix</label><br />
	    <input type="checkbox" name="vegetarien" id="vegetarien" /> <label for="vegetarien">Menu végétarien</label><br />
		<input type="checkbox" name="viande" id="viande" /> <label for="viande">Menu avec de la viande</label><br />
		<input type="checkbox" name="gluten" id="gluten" /> <label for="gluten">Menu sans gluten</label><br />
		<input type="checkbox" name="mer" id="mer" /> <label for="mer">Menu de la mer</label><br /><br /><br />
	    <input type="submit" value="Trier" >
   </p>
   
 

	</form>

      <TABLE>

        <TR><TH> Numéro du menu </TH>
            <TH > Entrée </TH>
            <TH > Plat </TH> 
            <TH > Dessert</TH> 
            <TH > Boisson</TH> 
            <TH > Prix en €</TH> 
            <!--<TH > Photos</TH>-->
        </TR> 
		

      <!--<img src="../image/menu.jpeg" alt="Menu Bon appétit"/><br />-->
            <?php 
				
			
                function Connect_db(){
                      $host="iutdoua-webetu.univ-lyon1.fr"; // ou sql.hebergeur.com
                      $user="p1305823";      // ou login
                      $password="191431";      // ou xxxxxx
                      $dbname="p1305823";
                  try {
                       $bdd=new PDO('mysql:host='.$host.';dbname='.$dbname.
                                    ';charset=utf8',$user,$password);
                       return $bdd;
                      } catch (Exception $e) {
                       die('Erreur : '.$e->getMessage());
                  }
                 }

                $bdd = Connect_db();
         
                
                /*$reponse = $bdd->query('SELECT * FROM menu');

                while ($donnees = $reponse->fetch())
                    {
                    ?>
                        <p>
                        <strong>Menu</strong> : <?php echo $donnees['IDmenu']; ?><br />
                        <br />
                        Entrée : <?php echo $donnees['entree']; ?><br />
                        Plat : <?php echo $donnees['plat']; ?> <br />
                        Dessert : <?php echo $donnees['dessert']; ?><br />
                        Boisson : <?php echo $donnees['boisson']; ?><br />
                        Prix : <?php echo $donnees['prix']; ?>€<br /><br />
                       </p>
                    <?php
                    }*/

				if(!isset($_POST['gluten'])){
					if(!isset($_POST['prix'])){
						if(!isset($_POST['vegetarien'])){
							if(isset($_POST['viande'])){
								$query = $bdd->prepare('Select * from menu where type="viande"');
							}
							else if(isset($_POST['mer'])){
								$query = $bdd->prepare('Select * from menu where type="mer"');
							}
							else{
								$query = $bdd->prepare('Select * from menu'); 
							}	
						}
						else if(isset($_POST['vegetarien'])){
							$query = $bdd->prepare('Select * from menu where type="vegetarian"'); 
						}
					}
					else{
						if(!isset($_POST['vegetarien'])){
							if(isset($_POST['viande'])){
								$query = $bdd->prepare('Select * from menu where type="viande" order by prix');
							}
							else if(isset($_POST['mer'])){
								$query = $bdd->prepare('Select * from menu where type="mer" order by prix');
							}
							else{
								$query = $bdd->prepare('Select * from menu order by prix'); 
							}	
						}
						else if(isset($_POST['vegetarien'])){
							$query = $bdd->prepare('Select * from menu where type="vegetarian" order by prix'); 
						}
					}
				}
				else{
					if(!isset($_POST['prix'])){
						if(!isset($_POST['vegetarien'])){
							if(isset($_POST['viande'])){
								$query = $bdd->prepare('Select * from menu where type="viande" and gluten=false');
							}
							else if(isset($_POST['mer'])){
								$query = $bdd->prepare('Select * from menu where type="mer" and gluten=false');
							}
							else{
								$query = $bdd->prepare('Select * from menu where gluten=false'); 
							}	
						}
						else if(isset($_POST['vegetarien'])){
							$query = $bdd->prepare('Select * from menu where type="vegetarian" and gluten=false'); 
						}
					}
					else{
						if(!isset($_POST['vegetarien'])){
							if(isset($_POST['viande'])){
								$query = $bdd->prepare('Select * from menu where type="viande" and gluten=false order by prix');
							}
							else if(isset($_POST['mer'])){
								$query = $bdd->prepare('Select * from menu where type="mer" and gluten=false order by prix');
							}
							else{
								$query = $bdd->prepare('Select * from menu  where gluten=false order by prix'); 
							}	
						}
						else if(isset($_POST['vegetarien'])){
							$query = $bdd->prepare('Select * from menu where type="vegetarian" and gluten=false order by prix'); 
						}
					}
				}
                      $query->execute();


                          while($data = $query->fetch()) {  
                              echo ("<tr> \n") ; 
                              echo ('<td><a href="#null" onclick="javascript:open_infos();">' . $data ['IDmenu']."</a></td> \n"); 
                              echo ('<td>' . $data ['entree']."</td> \n");
                              echo ('<td>' . $data ['plat']."</td> \n");
                              echo ('<td>' . $data ['dessert']."</td> \n");
                              echo ('<td>' . $data ['boisson']."</td> \n");
                              echo ('<td>' . $data ['prix']."</td> \n");
                              //echo ('<td>' . $data ['photos']."</td> \n");
                              echo ("</tr> \n") ;
							 
							}
			
               $query->closeCursor(); 
                    ?>     
				   		
              		</table>
              		<h2> Ou composez votre propre menu : </h2>
              		
              		<form action="carteComposer.php" method="post">
                      <select name="entree">
              		<?php 
              		$query = $bdd->prepare('Select * from Carte where type="Entree"');
              		$query->execute();
                                        while($data = $query->fetch()) {   
                                            echo ('<option value="' . $data ['Nom'].'">' .$data ['Nom'].' </option> '); 
              							 
              							}
              							 $query->closeCursor(); 
              		?>	 
              		</select>
              		<select name="plat">
              		<?php 
              		$query = $bdd->prepare('Select * from Carte where type="plat"');
              		$query->execute();
                                        while($data = $query->fetch()) {   
                                            echo ('<option value="' . $data ['Nom'].'">' .$data ['Nom'].' </option> '); 
              							 
              							}
              							 $query->closeCursor(); 
              		?>	 
              		</select>
              		<select name="dessert">
              		<?php 
              		$query = $bdd->prepare('Select * from Carte where type="dessert"');
              		$query->execute();
                                        while($data = $query->fetch()) {   
                                            echo ('<option value="' . $data ['Nom'].'">' .$data ['Nom'].' </option> '); 
              							 
              							}
              							 $query->closeCursor(); 
              		?>	 
              		</select>
              		<select name="boisson">
              		<?php 
              		$query = $bdd->prepare('Select * from Carte where type="boisson"');
              		$query->execute();
                                        while($data = $query->fetch()) {   
                                            echo ('<option value="' . $data ['Nom'].'">' .$data ['Nom'].' </option> '); 
              							 
              							}
              							 $query->closeCursor();
              					
              		?>	 
              		</select>
              		<input class="valider" type="submit" value="Composer" >
              		<?php
              			if(isset($_GET['msg'])){
              				if($_GET['msg'] == 1){
              					echo '<p class="valider"> Votre commande a bien été effectué. </p>'; 
              				}
              			}	
              		?>
		</form>		   
                <a href="../index.php"><button>Retour</button></a>
 
        </div>
    </body>
</html>
