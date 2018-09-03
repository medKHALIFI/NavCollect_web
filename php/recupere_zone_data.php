<?php
header("Access-Control-Allow-Origin: *");
session_start();

include_once('db_connect.php');

$query = "SELECT * FROM donnee;";
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