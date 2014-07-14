<?php
	ob_start();
	session_start(); 
	unset($_SESSION['IdCliente']); 
	unset($_SESSION['EmailCliente']); 
	unset($_SESSION['NomeCliente']);
	session_destroy();  
	header ("Location: ../index.php");
?>