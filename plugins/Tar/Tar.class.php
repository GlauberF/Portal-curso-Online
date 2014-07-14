<?php

class Tar{
	
	public function Extract($fonte, $folder){
		
		$phar = new PharData($fonte);
		$phar->extractTo('../../www/'.$folder); // extract all files
	
	}
}