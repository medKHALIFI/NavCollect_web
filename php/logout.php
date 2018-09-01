<?php

session_start();
session_unset(); 
session_destroy();
header('location: ../pages/login/sign-in.php');
?>