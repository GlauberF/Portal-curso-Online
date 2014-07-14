<?php
	session_start();
	
	/*
	$_SESSION['id'];
	$_SESSION['email'];
	$_SESSION['nome'];
	*/
		
	if(!isset($_SESSION['nome']))
		header ("Location: login.php");