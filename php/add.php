<?php
    include "db_connexion.php";

    $response = array();
    if(  isset($_GET["nom"]) && isset($_GET["prenom"]) && isset($_GET["sexe"]) && isset($_GET["num_tel"]) && isset($_GET["ville"]) && isset($_GET["commune"]) && isset($_GET["quartier"]) && isset($_GET["avenue"]) &&  isset($_GET["etat_actu"]) && isset($_GET["vide"]) )
    {
        $le_nom = $_GET["nom"];
        $le_prenom = $_GET["prenom"];
        $le_sexe = $_GET["sexe"];
        $le_num = $_GET["num_tel"];
        $la_ville = $_GET["ville"];

        $la_commune = $_GET["commune"];
        $le_quartier = $_GET["quartier"];
        $l_avenue = $_GET["avenue"];
        $l_etat = $_GET["etat_actu"];
        $ll_vide = $_GET["vide"];

        $req = mysqli_query($cnx, "INSERT INTO tb_utilisateur(Nom,Prenom,Sexe,Num_Tel,Ville,Commune,Quartier,Avenue,Etat_actu,El_libre) VALUES ('$le_nom', '$le_prenom', '$le_sexe', '$le_num', '$la_ville', '$la_commune', '$le_quartier', '$l_avenue', '$l_etat', '$ll_vide') ");
        
        if($req){
            $response["success"] = 1;
            $response["message"] = "inserted !";

            echo json_encode($response);
        }else {
            $response["success"] = 0;
            $response["message"] = "request error";

            echo json_encode($response);
        }

    }else {
        $response["success"] = 0;
        $response["message"] = "required file is missing !";

        echo json_encode($response);
    }