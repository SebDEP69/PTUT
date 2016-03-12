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
        <title>Affichage des réservations</title>
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
         
        ?>
        <table>
        <h1> Liste des réservations : </h1>
        <tr>
          <th> Id </th>
          <th> Nom </th>
          <th> Horaire </th>
          <th> Date </th>
          <th> Nombre de personne </th>
          <th> Numéro de table </th>
          <th> Numéro de menu </th>
          <th> Information </th>
        </tr>
      
          <?php
              $resultats=$bdd->query('SELECT * FROM reservation');
              $resultats->setFetchMode(PDO::FETCH_OBJ);
              while($resultat = $resultats->fetch() )
              {
                echo '<tr> <td> '. $resultat->IDres. '</td>' ;
                echo '<td> '. $resultat->nom. '</td>' ;
                echo '<td> '. $resultat->horaire. '</td>';
                echo '<td> '. $resultat->dateres. '</td>';
                echo '<td> '. $resultat->nbpers. '</td>';
                echo '<td> '. $resultat->tableid. '</td>';
                echo '<td> '. $resultat->idmenu. '</td>';
                echo '<td> '. $resultat->information. '</td>';
                echo '<td> <a onclick="return(confirm(\'Êtes vous sur de vouloir supprimer la réservation?\'));" href="deleteRes.php?id='.$resultat->IDres.'"> Supprimer </a> </td> </tr>';
              }
              $resultats->closeCursor();
              
              if(isset($_GET['msg'])){
                if($_GET['msg'] == 1){
                  echo '<p class="valider"> La réservation a bien été supprimée.</p>';
                }
              }
          ?>
          </table> 
            </form>
            <br>
            <button><a href="admin.php">Retour</a></button>
        </div>
    </body>
</html>
