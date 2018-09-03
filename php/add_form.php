<?php
include_once("db_connect.php");
session_start(); 
$id_admin=$_SESSION['id_admin'];
$formText=$_POST['formText'];
$formNom=$_POST['nom_form'];

$query = "SELECT * from formulaire where nom_form='$formNom'";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

if (pg_num_rows($result) == 0) {

	$query="INSERT INTO formulaire (id_admin, champs, date_creation_form, date_modification_form, nom_form)VALUES ('".$id_admin."','".$formText."', now(), now(), '".$formNom."')";

	$result = pg_query($query); 
	
	if($result){
		echo 1;
		pg_free_result($result);
	}
	else {
		echo 2;
	}
}
else{
	echo 0;
}


pg_close($dbconn);
 ?>

