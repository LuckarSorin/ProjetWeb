<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page admin</title>
    </head>
    <body>
        <h1>Page administration des outils professeur</h1>
        <table id="tabEmpreint">
        <?php
            if(session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
            require "data/dblogin.php";
        
            if(isset($_SESSION['connected'])){
        
                $connexion=mysqli_connect($host,$login,$mdp,$bdd) or die("connexion impossible");
        
                $req="select users.username,edits.name from users,edits where edits.disp = 0 and edits.empreint = users.userid";
        
                $stmt = mysqli_query($connexion, $req) or die('erreur');

                while($ligne = mysqli_fetch_array($stmt, MYSQLI_ASSOC)){    
                    echo "<tr>";
                    echo "<td>".$ligne['name']."</td>";
                    echo "<td>".$ligne['username']."</td>";
                    echo "</tr><br>";
                }
            }
            ?>
        </table>
        <a href="logout.php">Deconnection</a>
    </body>
</html>
