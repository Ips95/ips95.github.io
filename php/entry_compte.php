<?php

	include "db_connexion.php";

	$response = array();
	if(isset($_GET['num_tel']) && isset($_GET['mdp']))
	{
		$numero_tel = $_GET['num_tel'];
		$mot_de_passe = $_GET['mdp'];

		$req = mysqli_query($cnx, "SELECT * FROM tb_utilisateur WHERE Num_Tel='$numero_tel' AND El_libre='$mot_de_passe' ");

		if(mysqli_num_rows($req) > 0)
		{
			$tmp = array();

			$response["utilisateurs"] = array();
			$cur = mysqli_fetch_array($req);

			$tmp["Nom"] = $cur["Nom"];
			$tmp["Prenom"] = $cur["Prenom"];
			$tmp["Sexe"] = $cur["Sexe"];
			$tmp["Num_Tel"] = $cur["Num_Tel"];
			$tmp["Ville"] = $cur["Ville"];
			$tmp["Commune"] = $cur["Commune"];
			$tmp["Quartier"] = $cur["Quartier"];
			$tmp["Avenue"] = $cur["Avenue"];
			$tmp["Etat_actu"] = $cur["Etat_actu"];
			$tmp["El_libre"] = $cur["El_libre"];

			array_push($response["utilisateurs"], $tmp);
			$response["success"] = 1;
			echo json_encode($response);
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Aucune donnée trouvé";
			echo json_encode($response);
		}
	}
	else
	{
		$response["success"] = 0;
		$response["message"] = "Erreur d'insertion des données";
		echo json_encode($response);
	}

?>