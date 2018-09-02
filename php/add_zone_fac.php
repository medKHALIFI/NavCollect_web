<?php 
include_once("db_connect.php");

$nom_add=$_POST['nom_add'];
$source_add=$_POST['source_add'];
$geojson = $_POST['geojson'];

$query = "SELECT * from zone_facultative where nom_zone_fac='$nom_add'";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

if (pg_num_rows($result) == 0) {
    $query = "INSERT INTO zone_facultative (nom_zone_fac, source ,contenu_zone_fac  )VALUES ('$nom_add','$source_add' , '$geojson')";
    $result = pg_query($query); 

    if ($result) {
        echo 1;
        pg_free_result($result);
    }
    else{
        echo 2;
    }
}
else{
    echo 0;
}
	

pg_close($dbconn);


?>