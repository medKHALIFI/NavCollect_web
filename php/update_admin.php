<?php
session_start(); 
include '../php/db_connect.php';

$id_admin=$_SESSION['id_admin'];
$nom=$_POST['nom_update'];
$prenom=$_POST['prenom_update'];
$email=$_POST['email_update'];
$pseudo=$_POST['pseudo_update'];
$password = $_POST['password_update'];

$query = "UPDATE administrateur SET nom_admin = '$nom', prenom_admin = '$prenom', email_admin='$email', pseudo_admin='$pseudo', date_modification_admin='now()', password_admin='$password'  WHERE id_admin= '$id_admin'";
$result = pg_query($query); 
if($result){
    echo 1;
}
else {
    echo 0;
}

$query = "SELECT * FROM administrateur where id_admin= '$id_admin'";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

if (pg_num_rows($result) == 1) {

	$row=pg_fetch_array($result);
	$_SESSION["id_admin"] = $row["id_admin"];

	$_SESSION['nom']=$row['nom_admin'];
	$_SESSION['prenom']=$row['prenom_admin'];
	$_SESSION['username'] = $username;

}



// Libère le résultat
pg_free_result($result);

// Ferme la connexion
pg_close($dbconn);
 ?>

