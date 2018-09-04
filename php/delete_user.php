<?php
include_once("db_connect.php");
$id_agent = $_POST['id_agent'];

// Delete record
$query = "DELETE FROM agent WHERE id_agent= '$id_agent'";
$result = pg_query($query);

if($result){
	// supprimer les affectation de cet agent
	$query = "DELETE FROM affectation WHERE id_agent_affect= '$id_agent'";
$result = pg_query($query);
	echo 1; 
	pg_free_result($result);

}


pg_close($dbconn);


 ?>