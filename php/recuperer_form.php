<?php
session_start();
include_once("db_connect.php");


	//variables à partir du formulaire
	
	
	

	// Exécution de la requête SQL

	$query = "SELECT * FROM formulaire ";
	$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

	
		
		$data = array();
		while ($row = pg_fetch_object($result)) {
		$data[]=$row;
		}
	
		echo json_encode($data);
		
	// Libère le résultat
	pg_free_result($result);
	// Ferme la connexion
	pg_close($dbconn);


?>