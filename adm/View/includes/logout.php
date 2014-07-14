<?php
	ob_start();
	session_start(); 
	unset($_SESSION['id']); 
	unset($_SESSION['email']); 
	unset($_SESSION['nome']);
	session_destroy();  
	header ("Location: ../index.php");
?>