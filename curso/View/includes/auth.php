<?php
	session_start();
	
	/*
	$_SESSION['IdCliente'];
	$_SESSION['EmailCliente'];
	$_SESSION['NomeCliente'];
	$_SESSION['FolderCliente'];
	*/
		
	if(!isset($_SESSION['NomeCliente']))
		header ("Location: login.php");