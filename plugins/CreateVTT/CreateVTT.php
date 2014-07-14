<?php

class CreateVTT {
	
	public function write($nome, $cpf, $email){
		
		$my_file = 'vtt/'.$email.'.vtt';
				
		$data = "WEBVTT\n\n";

		$data .= "1\n";	
		$data .= "00:00:00.000 --> 00:00:40.000\n";
		$data .= "<b style=\"position: absolute; left: 15px; top: -20px;\">$nome - $cpf</b>\n\n";

		$data .= "2\n";
		$data .= "00:00:40.001 --> 00:02:00.000\n";
		$data .= "<b style=\"position: absolute; right: 15px; top: -20px;\">$nome - $cpf</b>\n\n";

		$data .= "3\n";
		$data .= "00:02:00.001 --> 00:04:00.000\n";
		$data .= "<b style=\"position: absolute; right: 15px; top: -60px;\">$nome - $cpf</b>\n\n";

		$data .= "4\n";
		$data .= "00:04:00.001 --> 00:06:00.000\n";
		$data .= "<b style=\"position: absolute; left: 15px; top: -60px;\">$nome - $cpf</b>\n\n";

		$data .= "5\n";
		$data .= "00:06:00.001 --> 00:08:00.000\n";
		$data .= "<b style=\"position: absolute; right: 15px; top: -60px;\">$nome - $cpf</b>\n\n";

		$data .= "6\n";
		$data .= "00:08:00.001 --> 00:10:00.000\n";
		$data .= "<b style=\"position: absolute; left: 15px; top: -60px;\">$nome - $cpf</b>\n\n";
		
		$data .= "7\n";
		$data .= "00:10:00.001 --> 00:12:00.000\n";
		$data .= "<b style=\"position: absolute; right: 15px; top: -20px;\">$nome - $cpf</b>\n\n";		
		
		$data .= "8\n";
		$data .= "00:12:00.001 --> 00:14:00.000\n";
		$data .= "<b style=\"position: absolute; left: 15px; top: -20px;\">$nome - $cpf</b>\n\n";				
		
		$data .= "9\n";
		$data .= "00:14:00.001 --> 00:16:00.000\n";
		$data .= "<b style=\"position: absolute; right: 15px; top: -60px;\">$nome - $cpf</b>\n\n";						
		
		$data .= "10\n";
		$data .= "00:16:00.001 --> 00:22:00.000\n";
		$data .= "<b style=\"position: absolute; left: 15px; top: -60px;\">$nome - $cpf</b>\n\n";								
		
		$data .= "11\n";
		$data .= "00:22:00.001 --> 00:28:00.000\n";
		$data .= "<b style=\"position: absolute; right: 15px; top: -20px;\">$nome - $cpf</b>\n\n";										
		
		$data .= "12\n";
		$data .= "00:28:00.001 --> 00:32:00.000\n";
		$data .= "<b style=\"position: absolute; left: 15px; top: -20px;\">$nome - $cpf</b>\n\n";												

		$data .= "13\n";
		$data .= "00:32:00.001 --> 00:38:00.000\n";
		$data .= "<b style=\"position: absolute; right: 15px; top: -60px;\">$nome - $cpf</b>\n\n";														
		
		$data .= "14\n";
		$data .= "00:38:00.001 --> 00:42:00.000\n";
		$data .= "<b style=\"position: absolute; left: 15px; top: -60px;\">$nome - $cpf</b>\n\n";												
		
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		fwrite($handle, $data);	
	}
	
}