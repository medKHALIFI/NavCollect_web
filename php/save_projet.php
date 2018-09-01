<?php 
include_once("db_connect.php");
session_start(); 

$id_admin = $_SESSION['id_admin'];
$nomProjet =$_POST['nomProjet'];
$descProjet =$_POST['descProjet'];

$query = "SELECT * FROM projet where titre= '$nomProjet'";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

if (pg_num_rows($result) == 0) {

   $query = "INSERT INTO projet( id_admin, titre, description_projet, date_creation_prj,date_modification_prj)VALUES ('$id_admin','$nomProjet','$descProjet',now(),now())";
   $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

   if($result){
		echo 1;
		pg_free_result($result);
	}

}else {
    echo 0;
}


pg_close($dbconn);

?>