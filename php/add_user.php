<?php
include_once("db_connect.php");

session_start(); 

$nom=$_POST['nom_add'];
$prenom=$_POST['prenom_add'];
$email=$_POST['email_add'];
$tele=$_POST['tele_add'];
$imei = $_POST['imei_add'];

//$hash = password_hash($form_pass, PASSWORD_DEFAULT);
 
// Exécution de la requête SQL
$query = "SELECT * FROM agent where imei= '$imei' ";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

//enregistrer le nouveau utilisateur 
if (pg_num_rows($result) == 0) {

	$query="INSERT INTO agent(id_admin, nom_agent, prenom_agent, email_agent, tele_agent, date_creation_agent, date_modification_agent, imei )VALUES (1 ,'".$nom."','".$prenom."','".$email."','".$tele."', now(), now(), '".$imei."' )";

	$result = pg_query($query); 

	if($result){
		echo 2;
	}
}
else 
{
	echo 1;
}

// Libère le résultat
pg_free_result($result);

// Ferme la connexion
pg_close($dbconn);
 ?>

