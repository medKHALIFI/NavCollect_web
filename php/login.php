<?php
session_start();
include_once("db_connect.php");



//variables à partir du formulaire

$username = trim($_POST['username']);
$password = trim($_POST['password']);


// Exécution de la requête SQL

$query = "SELECT * FROM administrateur where pseudo_admin= '$username' and password_admin='$password' ";
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

if (pg_num_rows($result) == 0) {

	echo "Email ou mot de passe incorrecte"; // wrong details 

}
else{
	echo "ok";
	
	$row=pg_fetch_array($result);
	$_SESSION["id_admin"] = $row["id_admin"];
		
	if(!empty($_POST["rememberme"])) {
		setcookie ("username",$username,time()+ (10 * 365 * 24 * 60 * 60));
		setcookie ("password",$password,time()+ (10 * 365 * 24 * 60 * 60));
	} else {
		if(isset($_COOKIE["username"])) {
			setcookie ("username","");
		}
		if(isset($_COOKIE["password"])) {
			setcookie ("password","");
		}
	}

	$_SESSION['nom']=$row['nom_admin'];
	$_SESSION['prenom']=$row['prenom_admin'];
	$_SESSION['username'] = $username;	
	
}

pg_free_result($result);

pg_close($dbconn);


?>