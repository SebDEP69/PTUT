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
                
                if(!empty($_POST['Nom'])and !empty($_POST['Type'])){
                    $req = $bdd->prepare('INSERT INTO Carte (Nom, Type, Prix) 
                    VALUES(:Nom, :Type, :Prix)');
                    $req->execute(array(
                                         
                                         'Nom' => $_POST['Nom'], 
                                         
                                         'Type'=>$_POST['Type'],
										 'Prix' => $_POST['Prix']
                                         ));
				echo '<p class="valider"> Le plat a été ajouté </p>';						 
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
                                <li><a href="admin.php">Menu admin</a></li>
                                <li><a href="ajout_carte.php">Gestion menus</a></li>
                                <li><a href="ajout_plat.php">Gestion plats</a></li>
                                <li><a href="affiche_res.php">Gestion Réservation</a></li>
                                <li><a href="deconnexionAdmin.php">Déconnexion</a></li>
			      </ul>
     
            <br />     
					
				<h1> Ajout de plat : </h1>
            <form class="formAdmin" name="Carte" action="ajout_plat.php" method="POST">
                <fieldset>
                    <legend>Ajout de plat</legend>
                    <label>Nom:</label>
                    <br />
                    <input type="text" name="Nom">

                    <br />
                    <br />
                    <label>Type:</label><br />
                    <select name="Type">
                      <option>Entrée</option>
                      <option>Plat</option>
                      <option>Dessert</option>
                      <option>Boisson</option>
                    </select>
                    <br />
                    <br />
                    <label>Prix:</label>
                    <br />
                    <input type ="text" name="Prix">
					          <br />
                    <br /> 
                    <!--<label>Photos:</label>
                    <br />
                    <input type ="file" name="photos">
                    <br />  -->
                </fieldset>	

                <br />
                <input class="valider" type="submit" value="Valider le plat" name="valide_plat" />
                <button><a href="admin.php">Retour</a></button>
                <br>
                
				
			<h1> Suppression de plat : </h1>
			<TABLE>

                    <TR>
                        <TH> ID Plat </th>
                        <TH > Nom</TH> 
                        <TH> Type </TH>
                        <TH > Prix en €</TH> 
                        <TH > Action</TH>
                    </TR> 
          <?php
              $resultats=$bdd->query('SELECT * FROM Carte');
              $resultats->setFetchMode(PDO::FETCH_OBJ);
              while($resultat = $resultats->fetch() )
              {
                echo '<tr> <td> '. $resultat->IDplat. '</td>' ;
                echo '<td> '. $resultat->Nom. '</td>' ;
                echo '<td> '. $resultat->Type. '</td>';
                echo '<td> '. $resultat->Prix. '</td>';
                echo '<td> <a onclick="return(confirm(\'Êtes vous sur de vouloir supprimer le plat?\'));" href="deletePlat.php?id='.$resultat->IDplat.'"> Supprimer </a> </td> </tr>';
              }
              $resultats->closeCursor();
              
              if(isset($_GET['msg'])){
                if($_GET['msg'] == 1){
                  echo '<p class="valider"> Le plat a bien été supprimé.</p>';
                }
              }
          ?>
          </table> 
            </form>
                
            
        </div>
    </body>
</html>