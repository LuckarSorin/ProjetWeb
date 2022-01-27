<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mes-Outils</title>
    </head>
    <header>
        <img src="image/logo_mes_outils.png" alt="Mes-Outils" height="100" width="100">
        <h1>Mes-Outils</h1>
        <div id="navigation">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="page-connection.php">Connection</a></li>
                <li><a href="page-inscription.php">Inscription</a></li>
            </ul>
        </div>
    </header>

    <body>
         <?php
            require "data/dblogin.php";

            if(session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
            if(isset($_SESSION['connected'])){
                $connexion=mysqli_connect($host,$login,$mdp,$bdd) or die("connexion impossible");

                $req="select userid from users where userid = ?";

                $stmt = mysqli_prepare($connexion, $req);
                mysqli_stmt_bind_param($stmt, "i", $_SESSION['connected']);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($result){
                    header('Location: index.php');
                    exit(0);
                }
            }
            //connexion.php n'utilise pas session_check.php pour éviter une boucle infinie de redirection

            if (isset($_GET['id'])){
                $id=$_GET['id'];
                if ($id=="pwd-mail_error"){
                    echo "<p style='color:red;'>L'adresse mail ou le mot de passe sont erronés</p>";
                }
                elseif ($id=="connexion_error"){
                    echo "<p style='color:red;'>Veuillez vous connecter</p>";
                    //Par exemple essayer de revenir en arrière sur une page ou il faut s'être déconnecté
                }
                elseif ($id=="logout"){
                    echo "<p style='color:red;'>Au revoir</p>";
                }
            }

            ?>
        <form method="post" action="page-connection.php">
            <tr>
                Login : 
                <input type="text" name="connection">
            </tr><br>
            <tr>
                MDP : 
                <input type="password" name="mdp" minlenght="4">
            </tr><br>
            <tr>
                <input type="submit" name="connect" value="connection">
            </tr>
        </form>
        
    </body>

</html>
