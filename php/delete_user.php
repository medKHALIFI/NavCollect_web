<?php
include_once("db_connect.php");
$id_agent = $_POST['id_agent'];

// Delete record
$query = "DELETE FROM agent WHERE id_agent= '$id_agent'";
$result = pg_query($query);

if($result){
	echo 1; 
	pg_free_result($result);

}


pg_close($dbconn);


 ?>