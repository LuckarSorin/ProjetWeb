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
        <div id="navigation">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="page-connection.php">Connection</a></li>
                <li><a href="page-inscription.php">Inscription</a></li>
            </ul>
        </div>
    </header>

    <body>
        <form method="post" action="connection.php">
            <tr>
                Login : 
                <input type="text" name="connection" >
            </tr><br>
            <tr>
                MDP : 
                <input type="password" name="mdp" minlenght="4">
            </tr><br>
            <tr>
                Vérification MDP : 
                <input type="password" name="mdp" minlenght="4">
            </tr><br>
            <tr>
                <input type="submit" name="connect" value="connection">
            </tr>
        </form>
    </body>

</html>