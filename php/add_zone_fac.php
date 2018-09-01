<?php 
include_once("db_connect.php");

$nom_add=$_POST['nom_add'];
$source_add=$_POST['source_add'];
$geojson = $_POST['geojson'];


$query = "INSERT INTO zone_facultative (nom_zone_fac, source ,contenu_zone_fac  )VALUES ('$nom_add','$source_add' , '$geojson')";
$result = pg_query($query); 

if ($result) {
    echo 1;
	pg_free_result($result);
}
	

pg_close($dbconn);


?>