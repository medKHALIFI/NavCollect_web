<?php
header("Access-Control-Allow-Origin: *");
session_start();

include_once('db_connect.php');

$query = "select affectation.id_projet_affect,agent.nom_agent,formulaire.nom_form,affectation.id_geom_affect from affectation,agent,formulaire  where affectation.id_agent_affect= agent.id_agent and affectation.id_formulaire_affect= formulaire.id_formulaire;";
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