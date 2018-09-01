<?php 
include_once("db_connect.php");

$id_agent=$_POST['id_agent'];
$nom=$_POST['nom_update'];
$prenom=$_POST['prenom_update'];
$email=$_POST['email_update'];
$tele=$_POST['tele_update'];
$imei=$_POST['imei_update'];


$query = "SELECT * FROM agent where id_agent='$id_agent'";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

if (pg_num_rows($result) == 1) {
	$query = "UPDATE agent SET nom_agent = '$nom', prenom_agent = '$prenom', email_agent='$email', tele_agent='$tele', date_modification_agent='now()', imei='$imei'  WHERE id_agent= '$id_agent'";
	$result = pg_query($query);

	echo 1; 
}
else{
	
	echo 2;
}
// Libère le résultat
pg_free_result($result);

// Ferme la connexion
pg_close($dbconn);


 ?>