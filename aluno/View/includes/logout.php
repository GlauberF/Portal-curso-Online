<?php
	ob_start();
	session_start(); 
	unset($_SESSION['idAluno']); 
	unset($_SESSION['emailAluno']); 
	unset($_SESSION['nomeAluno']);
	session_destroy();  
	header ("Location: ../index.php");
?>