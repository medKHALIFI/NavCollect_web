<?php

/* Database connection start */
$dbconn = pg_connect("host=localhost dbname=navcollect user=postgres password=khadija") or die('Connexion impossible : ' . pg_last_error());

?>
