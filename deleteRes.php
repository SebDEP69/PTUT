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
				 
				$idRes = $_GET['id'];
                
                   
        $req = $bdd->exec("delete from reservation where IDres='".$idRes."'");
				header('Location: affiche_res.php?msg=1');
                

?>