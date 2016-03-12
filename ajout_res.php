<?php
session_start();
if (isset($_SESSION['id'])) {
   
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
                
                             
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Réservation</title>
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
                                <li><a href="carte.php">Carte des menus</a></li>
                                <li><a href="ajout_res.php">Réservation</a></li>
                                <li><a href="deconnexion.php">Déconnexion</a></li>
			</ul>
            
                
                
                <form style="color:white;" name="Reservation" action="ajout_res.php" method="POST">
                <fieldset>
                    <legend>Réservation</legend>
                    <lable>Nombre de personnes:</label>
                    <br />
                    <input type="text" name="nb_pers">

                    <br />
                    <br />
                    <label>Horaire(de 19h à 22h):</label>
                    <br />
                    <input type="text" name="horaire">

                    <br />
                    <br />
                    <lavel>Date:</label>
                    <br />
                    <input type ="text" name="date_res">
                    <br />
                    <br />
                    <label>Numéro du menu (facultatif):</label>
                    <br />
                    <input type="text" name="idmenu">
                    <br />
                    <br />
                    <label>Numéro de table (facultatif) :</label>
                    <br />
                    <input type="text" name="table_id">
                    <br />
                    <br />
                    <label>Informations complémentaires:</label>
                    <br />
                    <input type="text" name="information">
                    <br />
                </fieldset>
                <br />
                <input class="valider" type="submit" value="Valider la réservation" name="Valide_res" />
				
				<?php
					
					if(!empty($_POST['horaire']) and !empty($_POST['date_res']) and !empty($_POST['nb_pers']) and !empty($_POST['table_id'])){ 
					
						$horaire =  $_POST['horaire'];
						$date = $_POST['date_res'];
						$nombrePers = $_POST['nb_pers'];
						$idTable = $_POST['table_id'];
            $idmenu = $_POST['idmenu'];
						$info = $_POST['information'];
					
                    $req = $bdd->prepare('INSERT INTO reservation (nom, horaire, dateres, nbpers, tableid, idmenu, information) VALUES(:nom, :horaire, :date_res, :nb_pers, :table_id, :idmenu, :information)');
                    $req->execute(array(
                                         'nom' => $_SESSION['pseudo'],
                                         'horaire' => $horaire,
                                         'date_res' => $date, 
                                         'nb_pers' => $nombrePers, 
                                         'table_id' => $idTable,
                                         'idmenu'=> $idmenu,  
                                         'information' => $info
                                         ));
					echo '<p class="valider"> Votre réservation a été validée !</p>';	
          echo'<p>Vous allez être contacté par email pour vous confirmer la réception de la réservation.
                  <H1>  Bonne journée !</h1> </p> ';
                				 
				}        
				
				?>
				
                
                
            
                
                
            
            
        </div>
    </body>
</html>