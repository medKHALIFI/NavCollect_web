<?php
include_once("db_connect.php");
$id_form = $_POST['id_form'];

// Delete record
$query = "DELETE FROM formulaire WHERE id_formulaire= '$id_form'";
$result = pg_query($query);

if($result){
	//supprimer les affectations de ce formulaire
	$query = "DELETE FROM affectation WHERE id_formulaire_affect= '$id_form'";
$result = pg_query($query);
	echo 1; 
	pg_free_result($result);

}

pg_close($dbconn);


 ?>