<?php
    if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }
    require "data/dblogin.php";	

    if(isset($_SESSION['connected'])){

        $connexion=mysqli_connect($host,$login,$mdp,$bdd) or die("connexion impossible");

        $req="select userid from users where userid = ?";

        $stmt = mysqli_prepare($connexion, $req);
        mysqli_stmt_bind_param($stmt, "i", $_SESSION['connected']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        foreach($result as $ligne) $cat = $ligne;
        if (!isset($cat)){
            $_SESSION['connected'] = NULL;
            header('Location: page-connection.php?id=connexion_error');
            exit(0);
        }

    }else{
        header('Location: page-connection.php?id=connexion_error');
        exit(0);
    }
?>
