<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Rest'Online</title>
        <meta charset="UTF-8 without BOM">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="bloc-page">
            <div id="header">
                            <p>Rest'Online</p>
                        </div>
            <article>
            <form name="compte.php" action="compte.php" method="POST">
            <img src="../image/compte.png" alt="Image d'authentification"/>
            <h3>Veuillez vous connecter pour entrer sur notre site.</h3>
            <fieldset>
                <legend>Informations d'authentification</legend>
                <br>
                <label>Login :</label>
                <br>
                                                    <input type="text" name="pseudo" value="" />
                <br>
                <label>Password :</label>
                <br>
                <input type="password" name="pass" value="" />
                <br>
                          </fieldset>
            <br>
            
            
            <input class="valider" type="submit" value="Valider">
            <input class="valider" type="reset" value="Effacer" name="reset"/><br>
            <br />
            </form>
        </article>
        <aside>
            <form method="POST" action="inscription.php">
            <img src="../image/compte.png" alt="Image d'authentification"/>
            <h1>Vous n'avez pas de compte? </h1>
            <h4>Créer un compte en remplissant le formulaire ci-dessous : </h4>
            <fieldset>
            <legend>Informations d'inscription</legend>   
                    <label class="titreId"for="pseudo"> Login : </label> <br>
                    <input type="text" name="pseudo"/> <br/>
                    <label class="titreMdp"for="mdp"> Password : </label> <br>
                    <input type="password" name="mdp"/> <br/>
                    <label class="titreMdp"for="email"> Email : </label> <br>
                    <input type="text" name="email"/> <br/>
                    <input class="valider" type="submit" name="valider"> <br/>
                </form>
                </fieldset>
            
            <?php
                if(isset($_GET['msg'])){
                    if($_GET['msg']==1){
                        echo "<h4> Votre compte a été créé. Veuillez vous connecter.</h4>";
                    }
                }
            ?>


        </aside>
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
                
                if(isset($_POST['pass']) and isset($_POST['pseudo'])){
                    $pass = $_POST['pass'];
                    $pseudo=$_POST['pseudo'];  
                                             
                    $req = $bdd->prepare('SELECT id, statut FROM membres WHERE pseudo = :pseudo AND pass = :pass');
                    $req->execute(array(
                        'pseudo' => $pseudo,
                        'pass' => $pass));

                $resultat = $req->fetch();

                if ($resultat)
                {
                    session_start();
                    $_SESSION['id'] = $resultat['id'];
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['statut'] = $resultat['statut'];
                    echo ('<h1>Vous êtes maintenant connecté :</h1>');
                    if ($_SESSION['statut']==0)
                    {
                        header('Location:../index.php');
                        echo('<button><a href="../index.php"> <h1>Cliquez ici pour accéder au site </H1></a></button>');
                    }
                    else
                    {
                        header('Location:admin.php');
                        echo('<button><a href="admin.php"> <h1>Cliquez ici Vincent pour accéder à votre site </H1></a></button>');
                    }
                }}?>
                <br />
                <br />
               
            <br />
            </form>
            
        </div>
    </body>
</html>