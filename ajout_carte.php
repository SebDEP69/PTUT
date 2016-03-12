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
                                <li><a href="admin.php">Menu admin</a></li>
                                <li><a href="ajout_carte.php">Gestion menus</a></li>
                                <li><a href="ajout_plat.php">Gestion plats</a></li>
                                <li><a href="affiche_res.php">Gestion Réservation</a></li>
                                <li><a href="deconnexionAdmin.php">Déconnexion</a></li>
            </ul>
     
            <br />
            <h1> Ajout de menu : </h1>
            <form class="formAdmin" name="Carte" action="ajout_carte.php" method="POST">
                <fieldset>
                    <legend>Ajout de menu</legend>
                    <label>Entree:</label>
                    <br />
                    <input type="text" name="entree">

                    <br />
                    <br />
                    <label>Plat:</label>
                    <br />
                    <input type="text" name="plat">

                    <br />
                    <br />
                    <label>Dessert:</label>
                    <br />
                    <input type="text" name="dessert">

                    <br />
                    <br />
                    <label>Boisson:</label>
                    <br />
                    <input type ="text" name="boisson">

                    <br />
                    <br />
                    <label>Prix:</label>
                    <br />
                    <input type ="text" name="prix">
                    <br /> 

                    <br />
                    <label>Type:</label><br>
                    <select name="type">
                      <option>viande</option>
                      <option>vegetarian</option>
                      <option>mer</option>
                    </select>
                    <!--<label>Photos:</label>
                    <br />
                    <input type ="file" name="photos">
                    <br />  -->
                </fieldset>

                <br />
                <input  class= "valider" type="submit" value="Valider le menu" name="valide_menu" />
                <button><a href="admin.php">Retour</a></button>
                <br>
<?php
session_start();
      if (($_SESSION['pseudo'])=="Vincent") {
          
          // On est certain de pouvoir y accéder ici
      } else {
          header('Location:compte.php');
      }
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
                
                if(!empty($_POST['entree']) and !empty($_POST['plat']) and !empty($_POST['dessert']) and !empty($_POST['boisson'])){
                    $req = $bdd->prepare('INSERT INTO menu (entree, plat, dessert, boisson, prix, type) VALUES(:entree, :plat, :dessert, :boisson, :prix, :type)');
                    $req->execute(array(
                                         'entree' => $_POST['entree'], 
                                         'plat' => $_POST['plat'], 
                                         'dessert' => $_POST['dessert'], 
                                         'boisson' => $_POST['boisson'],
                                         'prix'=>$_POST['prix'],
										 'type' => $_POST['type']
                                         ));
				echo '<p class="valider"> Le menu a été ajouté. </p>';						 
                }
?>
              
				
			<h1> Suppression de menu : </h1>
			<TABLE>

                    <TR><TH> Numéro du menu </TH>
                        <TH > Entrée </TH>
                        <TH > Plat </TH> 
                        <TH > Dessert</TH> 
                        <TH > Boisson</TH> 
                        <TH > Prix en €</TH> 
						<TH> Type </TH>
                        <TH > Action</TH>
                        <!--<TH> Photos </TH>-->
                    </TR> 
          <?php
              $resultats=$bdd->query('SELECT * FROM menu');
              $resultats->setFetchMode(PDO::FETCH_OBJ);
              while($resultat = $resultats->fetch() )
              {
                echo '<tr> <td> '. $resultat->IDmenu. '</td>' ;
                echo '<td> '. $resultat->entree. '</td>' ;
                echo '<td> '. $resultat->plat. '</td>';
                echo '<td> '. $resultat->dessert. '</td>';
                echo '<td> '. $resultat->boisson. '</td>';
                echo '<td> '. $resultat->prix. '</td>';
                //echo '<td> '. $resultat->photos. '</td>';
				echo '<td> '. $resultat->Type. '</td>';
                echo '<td> <a onclick="return(confirm(\'Êtes vous sur de vouloir supprimer le menu?\'));" href="deleteMenu.php?id='.$resultat->IDmenu.'"> Supprimer </a> </td> </tr>';
              }
              $resultats->closeCursor();
              
              if(isset($_GET['msg'])){
                if($_GET['msg'] == 1){
                  echo '<p class="valider"> Le menu a bien été supprimé.</p>';
                }
              }
          ?>
          </table> 
            </form>
                
            
        </div>
    </body>
</html>