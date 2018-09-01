<?php

session_start();

include_once('db_connect.php');

//$query = "SELECT projet.titre FROM projet, affectation where affectation.id_agent_affect= 4 and affectation.id_projet_affect=projet.id_projet;";
$query = "SELECT zone_etude.nom_zone FROM zone_etude, affectation where affectation.id_agent_affect= 3 and affectation.id_projet_affect=2 and zone_etude.id_zone= affectation.id_zone_affect ;";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());


$data=array();

while ($row = pg_fetch_object($result)) {
 
    $data[]=$row;
}

echo json_encode($data);

// Libère le résultat
pg_free_result($result);

// Ferme la connexion
pg_close($dbconn);

?>