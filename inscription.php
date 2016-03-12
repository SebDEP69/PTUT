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

	$id = $_POST['pseudo'];
	$mdp = $_POST['mdp'];
	$mail = $_POST['email'];
	//On récupère la date d'aujourd'hui
	$date = date("Y-m-d");
	
	if(!empty($id) and !empty($mdp) and !empty ($mail)){

		$resultat=$bdd->prepare("INSERT INTO `membres` (pseudo, pass, email, date_inscription, statut)
			 VALUES (:pseudo, :pass, :email, :d, :statut)");

			$resultat->execute(array(
				'pseudo' => $id,
				'pass' => $mdp,
				'email' => $mail,
				'd' => $date,
				'statut' => 0
				));
			header('Location: compte.php?msg=1');
			exit();
	}
	else{
		header('Location: compte.php?msg=-1');
		exit();
	}
	
?>