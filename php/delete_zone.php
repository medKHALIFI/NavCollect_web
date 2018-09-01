<?php
include_once("db_connect.php");
$id_zone = $_POST['id_zone'];

// Delete record
$query = "DELETE FROM zone_etude WHERE id_zone= '$id_zone'";
$result = pg_query($query);

echo 1; 
// Libère le résultat
pg_free_result($result);

// Ferme la connexion
pg_close($dbconn);



 ?>