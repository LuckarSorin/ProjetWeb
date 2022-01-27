
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Mes-Outils</title>
    </head>
    <header>
        <img src="image/logo_mes_outils.png" alt="Mes-Outils" height="100" width="100">
        <h1>Mes-Outils</h1>
        <a href="logout.php">Déconnection</a>
    </header>

    <body>
        <?php
            include"session_check.php";
            if(session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
            require "data/dblogin.php";
        
            if(isset($_SESSION['connected'])){
        
                $connexion=mysqli_connect($host,$login,$mdp,$bdd) or die("connexion impossible");
        
                $req="select name,disp from edits";
        
                $stmt = mysqli_query($connexion, $req) or die('erreur');

                while($ligne = mysqli_fetch_array($stmt, MYSQLI_ASSOC)){    
                    echo "<tr>";
                    echo "<td>".$ligne['name']."</td>";
                    if($ligne['disp']==NULL){
                        echo"<td>Disponible</td>";
                    }else{
                        echo"<td>indisponible</td>";
                    }
                    echo "</tr><br/>";
                }
            }
        ?>
    </body>

</html>
