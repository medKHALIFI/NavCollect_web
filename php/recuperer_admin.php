<?php
session_start(); 
include '../php/db_connect.php';

$query = "SELECT * FROM administrateur where id_admin='$_SESSION[id_admin]' ";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

$data = array();
while ($row = pg_fetch_object($result)) {
	$data[]=$row;
}

echo json_encode($data);
	
pg_free_result($result);
pg_close($dbconn);


?>