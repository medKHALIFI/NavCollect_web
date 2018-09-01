<?php 
include_once("db_connect.php");

$geojson = $_POST['geojson'];
$nom_zone=$_POST['nom_zone'];

$query = "INSERT INTO zone_etude ( id_admin, nom_zone, etendue)VALUES (1,'$nom_zone' ,'$geojson')";
$result = pg_query($query); 


if ($result) {
    echo 1;
	pg_free_result($result);
}

// Ferme la connexion
pg_close($dbconn);


 ?>