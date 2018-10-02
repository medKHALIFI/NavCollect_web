<?php

/* Database connection start */
$dbconn = pg_connect("host=localhost dbname=test_github user=postgres password=postgres") or die('Connexion impossible : ' . pg_last_error());

?>
