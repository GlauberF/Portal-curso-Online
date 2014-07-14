<?php

class Layout{

	public $id;
	public $cliente_idcliente;
	public $tema_idtema;
	public $capa;
	
	protected function setid($id){
		$this->id = $id;
	}

	protected function setcliente_idcliente($cliente_idcliente){
		$this->cliente_idcliente = $cliente_idcliente;
	}

	protected function settema_idtema($tema_idtema){
		$this->tema_idtema = $tema_idtema;
	}	
	
	protected function setcapa($capa){
		$this->capa = $capa;
	}	
	
	public function all($id){

		$arr = array();	
			
		$sql = "SELECT `layout`.`id` as `id`, `tema`.`capa` as `capa` FROM `layout` 
				INNER JOIN `tema` ON `tema`.`id`=`layout`.`tema_idtema`
				WHERE `layout`.`cliente_idcliente`=$id;";		
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
		
		while($dados = mysql_fetch_array($result)){
			$cliente = new Layout();
			$cliente->setid(array('id' => $dados['id']));
			$cliente->setcapa(array('capa' => $dados['capa']));
			$arr[] = $cliente;
		}
		return $arr;
	}	
	
	public function Cad($cliente, $id){
		
		$vai = new MySQLDB();
				
		$sql = "SELECT `zip` FROM `tema` WHERE `id` = $id;";
		$result = $vai->ExecuteQuery($sql);
		$objeto2 = mysql_fetch_object($result);

		$sql2 = "SELECT `cliente`.`idcliente`, `cliente`.`nome`, `cliente`.`site`, `cliente`.`logo`, `cliente`.`folder`, `gateway`.`email`, `gateway`.`token` FROM `cliente` 
		INNER JOIN `gateway` ON `cliente`.`idcliente`=`gateway`.`cliente_idcliente` 
		WHERE `cliente`.`idcliente` = $cliente AND `gateway`.`ativo`=1;";
		$result2 = $vai->ExecuteQuery($sql2);
		$objeto = mysql_fetch_object($result2);
		
		//------------verifica se gateway está ativo-------------		
		if(!$objeto->folder){
			$erro = "Por favor, cadastre o gateway antes de prosseguir.";
			header ("Location: layout.php?vi=erro&ed=$cliente&error=$erro");
		}	

		//------------zip part-------------
		include("../../plugins/Tar/Tar.class.php");
	    //$phar = new Tar();
	    //$phar->Extract($objeto2->zip, $objeto->folder); // extract all files
		//------------zip part-------------		
		
		
		//------------xml part-------------		
		include("../../plugins/CreateXML/index.php");
		$create = new CreateXML();		
		$criacao = $create->Create($objeto->idcliente, $objeto->nome, $objeto->site, $objeto->logo, $objeto->email, $objeto->token, $objeto->folder);		
		//------------xml part-------------		
		
		if($criacao == true){
			echo $sql = "INSERT INTO `layout` (`cliente_idcliente`, `tema_idtema`, `ativo`) VALUES ($cliente, $id, 1);";
			exit();
			$vai->executeQuery($sql);
			header ("Location: layout.php?vi=cad&ed=$cliente");					
		}else{
			header ("Location: layout.php?vi=errocache&ed=$cliente");			
		}		
		
	}

	public function ResetCache($cliente){
		
		$vai = new MySQLDB();
		$sql = "SELECT `cliente`.`idcliente`, `cliente`.`nome`, `cliente`.`site`, `cliente`.`logo`, `cliente`.`folder`, `gateway`.`email`, `gateway`.`token` FROM `cliente` 
		INNER JOIN `gateway` ON `cliente`.`idcliente`=`gateway`.`cliente_idcliente` 
		WHERE `cliente`.`idcliente` = $cliente AND `gateway`.`ativo`=1;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		
		//------------verifica se gateway está ativo-------------		
		if(!$objeto->folder){
			$erro = "Por favor, cadastre o gateway antes de prosseguir.";
			header ("Location: layout.php?vi=erro&ed=$cliente&error=$erro");
			exit();
		}			
		
		include("../../plugins/CreateXML/index.php");
		
		$create = new CreateXML();
		
		$criacao = $create->Create($objeto->idcliente, $objeto->nome, $objeto->site, $objeto->logo, $objeto->email, $objeto->token, $objeto->folder);
		
		if($criacao == true){
			header ("Location: layout.php?vi=cache&ed=$cliente");
		}else{
			header ("Location: layout.php?vi=errocache&ed=$cliente");			
		}
		
	}
	
}

?>