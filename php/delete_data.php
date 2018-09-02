<?php
include_once("db_connect.php");
$id_data = $_POST['id_data'];

// Delete record
$query = "DELETE FROM donnee WHERE id_data= '$id_data'";
$result = pg_query($query);

if($result){
	echo 1; 
	pg_free_result($result);

}


pg_close($dbconn);


 ?>