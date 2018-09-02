<?php
include_once("db_connect.php");
$id_affect = $_POST['id_affect'];

// Delete record
$query = "DELETE FROM affectation WHERE id_affect= '$id_affect'";
$result = pg_query($query)or die('Échec de la requête : ' . pg_last_error());

if($result){
    echo 1; 
    // Libère le résultat
    pg_free_result($result);
} else{
    echo 0;
}
// Ferme la connexion
pg_close($dbconn);

?>