<?php
header("Access-Control-Allow-Origin: *");
session_start();

include_once('db_connect.php');

$query = "select agent.prenom_agent, affectation.id_affect, affectation.id_projet_affect,agent.nom_agent,formulaire.nom_form,affectation.id_geom_affect, zone_etude.nom_zone from affectation,agent,formulaire, zone_etude  where affectation.id_agent_affect= agent.id_agent and affectation.id_formulaire_affect= formulaire.id_formulaire and affectation.id_projet_zone= zone_etude.id_zone;";
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