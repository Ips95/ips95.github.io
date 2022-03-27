<?php
    include "db_connexion.php";

    $response = array();
    if (isset($_GET["num_tel"]) && isset($_GET["mdp"]) ) {
        $le_num = $_GET["num_tel"];
        $le_mdp = $_GET["mdp"];

        $req = mysqli_query($cnx, "SELECT * FROM tb_utilisateur WHERE Num_Tel='$le_num' AND El_libre='$le_mdp' ");
        if(mysqli_num_rows($req) > 0){
            $tmp = array();

            $response["tb_utilisateur"] = array();

            $cur = mysqli_fetch_array($req);
             $tmp["Nom"] = $cur["Nom"]; 
             $tmp["Preom"] = $cur["Prenom"]; 
             $tmp["Sexe"] = $cur["Sexe"]; 
             $tmp["Num_Tel"] = $cur["Num_Tel"]; 
             $tmp["Ville"] = $cur["Ville"]; 
             $tmp["Commune"] = $cur["Commune"]; 
             $tmp["Quartier"] = $cur["Quartier"]; 
             $tmp["Avenue"] = $cur["Avenue"]; 
             $tmp["Etat_actu"] = $cur["Etat_actu"]; 
             $tmp["El_libre"] = $cur["El_libre"]; 

             array_push($response["tb_utilisateur"], $tmp);
             $response["success"] = 1;
             echo json_encode($response); 
        }else {
            $response["success"] = 0;
            $response["message"] = "Aucune donné trouvé";

            echo json_encode($response);
        }

    }else {
        $response["success"] = 0;
        $response["message"] = "Required file is missing !";

            echo json_encode($response);    
    }