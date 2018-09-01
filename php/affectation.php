<?php 
    //Connexion à la base de données:
	include_once("db_connect.php");

	// Récupération des variables par la méthode POST:
	$projet = 0;
	$zone =$_POST['selected_zone'];
	$formulaire =$_POST['selected_form'];
	$agent =$_POST['selected_agent'];
	$geometrie =$_POST['selected_geometry'];

	// Recupération de l'identifiant de dernier projet crée:
	$query_project ="SELECT * from projet order by id_projet desc limit 1;";
	$result = pg_query($query_project) or die('Échec de la requête : ' . pg_last_error());
	$myrow = pg_fetch_assoc($result); 
	$projet = $myrow[id_projet];

	//Insertion d'une nouvelle affectation:
	$query = "INSERT INTO affectation( id_projet_affect, id_agent_affect, id_projet_zone, id_formulaire_affect,id_geom_affect)VALUES ('$projet','$agent','$zone','$formulaire', '$geometrie')";
	$result = pg_query($query);
	if($result){

		echo 1;
		//Libération du variable $result :
		pg_free_result($result);

	}

	//Fermeture de la connexion:
	pg_close($dbconn);

?>