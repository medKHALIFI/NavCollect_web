<?php
include_once("db_connect.php");
$id_zone = $_POST['id_zone'];

// Delete record
$query = "DELETE FROM zone_etude WHERE id_zone= '$id_zone'";
$result = pg_query($query);



if($result){

    $query = "DELETE FROM affectation WHERE id_projet_zone=  '$id_zone'";
    $result = pg_query($query)or die('Échec de la requête : ' . pg_last_error());
        echo 1; 
        // Libère le résultat
        pg_free_result($result);
    }

// Ferme la connexion
pg_close($dbconn);



 ?>