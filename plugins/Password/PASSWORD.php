<?php

class PASSWORD {

	// blowfish to deal with high potential attacks bits.
	private static $algo = '$2x';
	
	// cost parameter - iteration of one or more actions - necessary to use the blowfish crypt()
    private static $cost = '$10';

	//generating a salt whenever necessary
	public static function generateSalt() {
		return substr(sha1(mt_rand()),0,22);
	}
	
	//function to generate a new hash
	public static function hash($password) {
		return crypt($password,
		self::$algo .
		self::$cost .
		'$' . self::generateSalt());
	}

	// login function to compare with the password hash
	public static function check_password($hash, $password) {
		$full_salt = substr($hash, 0, 29);
		$new_hash = crypt($password, $full_salt);
		return ($hash == $new_hash);
	}

	/*
	// forgot password function to send a link to redo the password
	public static function forgot_password($email, $guid) {
		 $link = IP_Registry_Application::getConfig()->getProperty('site_url') . 'Index/Dopass?user='.$guid.'&token='.$new_guids;
return $link;
	}	
	*/
}
