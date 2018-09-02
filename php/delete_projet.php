<?php
include_once("db_connect.php");
$id_projet = $_POST['id_projet'];

// Delete record
$query = "DELETE FROM projet WHERE id_projet= '$id_projet'";
$result = pg_query($query);


$query = "DELETE FROM affectation WHERE id_projet_affect=  '$id_projet'";
$result = pg_query($query);

echo 1; 
// Libère le résultat
pg_free_result($result);

// Ferme la connexion
pg_close($dbconn);



 ?>