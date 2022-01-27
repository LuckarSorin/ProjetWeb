
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page admin</title>
    </head>
    <?php
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        require "data/db_login.php";
    
        if(isset($_SESSION['connected'])){
    
            $connexion=mysqli_connect($host,$login,$mdp,$bdd) or die("connexion impossible");
    
            $req="select users.username,edits.name from users,edits where edits.disp = 0 and edits.userid = users.userid";
    
            $stmt = mysqli_prepare($connexion, $req);
            mysqli_stmt_bind_param($stmt, "ss", $_SESSION['connected']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);

            if(mysqli_num_rows($result)>=1){
                foreach($result as $ligne) $return = $ligne;
            }else{
                $return = NULL;
            }
            
            
            for ($i, i<len($return){

            }

        }
        ?>
    <body>
        <h1>Page administration des outils professeur</h1>
        <?php
        echo "<table id="tabEmpreint">";
        for ($i; i<len($return; i++){
            echo"<tr>
            <td>
            $return[i][0]
            </td>
            <td>
            $return[i][1]
            </td>
            </tr>";
        }
        echo"</table>"
        ?>
    </body>
</html>