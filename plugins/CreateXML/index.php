<?php

class CreateXML{
	
	public function Create($idcliente, $nomecliente, $sitecliente, $logocliente, $email, $token, $folder){
	
		//echo $idcliente, $nomecliente, $sitecliente, $logocliente, $email, $token, $folder;
		//exit();
		$dom = new DOMDocument('1.0','UTF-8');
		 
		$dom->preserveWhiteSpaces = false;
		 
		$dom->formatOutput = true;
		 
		$note = $dom->createElement('note');
		 
		$id = $dom->createElement('id'); 
		$nome = $dom->createElement('nome'); 
		$site = $dom->createElement('site');
		$pasta = $dom->createElement('folder');		 	
		$logo = $dom->createElement('logo'); 	
		$pagseguro = $dom->createElement('pagseguro'); 	
		$tok = $dom->createElement('token'); 	
		
		$id->appendChild($dom->createTextNode($idcliente));
		$nome->appendChild($dom->createTextNode($nomecliente));
		$site->appendChild($dom->createTextNode($sitecliente));
		$pasta->appendChild($dom->createTextNode($folder));
		$logo->appendChild($dom->createTextNode($logocliente));
		$pagseguro->appendChild($dom->createTextNode($email));
		$tok->appendChild($dom->createTextNode($token));
		
		$note->appendChild($id);
		$note->appendChild($nome);
		$note->appendChild($site);
		$note->appendChild($pasta);
		$note->appendChild($logo);
		$note->appendChild($pagseguro);
		$note->appendChild($tok);
		
		$dom->appendChild($note);
		$dom->saveXML(); 
		if(!$dom->save('../../www/'.$folder.'/config/config.xml')){
			return false;
		}else{
			return true;
		}
		
	}

}