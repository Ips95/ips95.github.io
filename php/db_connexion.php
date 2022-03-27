<?php
    $serveur = "mysql-ips.alwaysdata.net";
    $utilisateur = "ips_admin";
    $mdp = "1i2p3sCorps";
    $bd = "ips_bd_sante";

    $cnx = mysqli_connect("mysql-ips.alwaysdata.net", "ips_admin", "1i2p3sCorps");
    if(!$cnx){
        echo "Erreur de connexion";
    }
    $db = mysqli_select_db($cnx, "ips_bd_sante");
    if(!$db)
    {
        echo "Erreur de connexion à la base";
    }