<?php 
include_once("db_connect.php");

$id_form = $_POST['id_form'];
$nomProjet =$_POST['nomProjet'];
$descProjet =$_POST['descProjet'];
$agentZone =$_POST['agentZone'];



echo count($agentZone);
/*

$query = "INSERT INTO projet ( id_admin, id_formulaire, titre, description_projet, date_creation_prj,date_modification_prj)VALUES (1,'$nom_zone' ,'$geojson')";
$result = pg_query($query); 


if ($result) {
    echo 1;
	pg_free_result($result);
}
*/
// Ferme la connexion
pg_close($dbconn);


 ?>