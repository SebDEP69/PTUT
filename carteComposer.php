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
				 
	$entree = $_POST['entree'];
	$plat = $_POST['plat'];
	$dessert = $_POST['dessert'];
	$boisson = $_POST['boisson'];
                
         $req=$bdd->prepare("INSERT INTO `menu` (entree, plat, dessert, boisson, prix)
		 VALUES (:entree, :plat, :dessert, :boisson, :prix)");

		$req->execute(array(
			'entree' => $entree,
			'plat' => $plat,
			'dessert' => $dessert,
			'boisson' => $boisson,
			'prix' => 12
			));
		header('Location: carte.php?msg=1');     
?>