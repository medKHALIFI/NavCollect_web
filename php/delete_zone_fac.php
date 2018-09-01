<?php
include_once("db_connect.php");
$id_zone = $_POST['id_zone'];

$query = "DELETE FROM zone_facultative WHERE id_zone_fac= '$id_zone'";
$result = pg_query($query);

if ($result) {
    echo 1;
	pg_free_result($result);
}

pg_close($dbconn);

?>