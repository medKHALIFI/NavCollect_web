<?php
include_once("db_connect.php");

$formText=$_POST['formText'];
$formNom=$_POST['nom_form'];


$query="INSERT INTO formulaire (id_admin, champs, date_creation_form, date_modification_form, nom_form)VALUES (1,'".$formText."', now(), now(), '".$formNom."')";

$result = pg_query($query); 
if($result){
	echo 2 ;
	pg_free_result($result);
}
else {
	echo 1;
}


pg_close($dbconn);
 ?>

