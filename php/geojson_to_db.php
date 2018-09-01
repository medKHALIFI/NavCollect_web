<?php 
include_once("db_connect.php");

$geojson = $_POST['geojson'];
$nom_zone=$_POST['nom_zone'];

$query = "SELECT * from zone_etude where nom_zone='$nom_zone'";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

//enregistrer une nouvelle zone 
if (pg_num_rows($result) == 0) {

	$query="INSERT INTO zone_etude ( id_admin, nom_zone, etendue)VALUES (1,'$nom_zone' ,'$geojson')";

	$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error()); 

	if($result){
		echo 1;
    }
    else{
        echo 2;
    }
}
else 
{
	echo 0;
}

// Ferme la connexion
pg_close($dbconn);


 ?>