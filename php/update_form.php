<?php 
include_once("db_connect.php");

$id_formulaire=$_POST['id_formulaire'];
$champs=$_POST['champs'];

$query = "SELECT * FROM formulaire where id_formulaire= '$id_formulaire' ";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

$query = "UPDATE formulaire SET champs = '$champs', date_modification_form='now()'  WHERE id_formulaire= '$id_formulaire'";
$result = pg_query($query) or die('Échec de la mise à jour : ' . pg_last_error());

echo 1; 

pg_free_result($result);

pg_close($dbconn);


 ?>