<?php
	session_start();
	
	/*
	$_SESSION['idAluno'];
	$_SESSION['emailAluno'];
	$_SESSION['nomeAluno'];
	$_SESSION['clienteAluno']
	*/
		
	if(!isset($_SESSION['nomeAluno']))
		header ("Location: login.php");