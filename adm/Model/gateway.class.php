<?php

class Gateway{

	public $id;
	public $nome;
	public $email;
	public $token;
	public $ativo;
	public $cliente_idcliente;	

	protected function setid($id){
		$this->id = $id;
	}

	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setemail($email){
		$this->email = $email;
	}

	protected function settoken($token){
		$this->token = $token;
	}

	protected function setativo($ativo){
		$this->ativo = $ativo;
	}	
	
	protected function setcliente_idcliente($cliente_idcliente){
		$this->cliente_idcliente = $cliente_idcliente;
	}		

	public function all($id, $cliente){

		$vai = new MySQLDB();
		
		$arr = array();	
		if (is_null($id)){
			$sql = "SELECT `gateway`.`id`, `gateway`.`nome`, `gateway`.`email`, `gateway`.`token`, `gateway`.`ativo`, `gateway`.`cliente_idcliente` FROM `gateway` WHERE `cliente_idcliente` = $cliente;";
			$result = $vai->executeQuery($sql);
		}else{
			$sql = "SELECT `gateway`.`id`, `gateway`.`nome`, `gateway`.`email`, `gateway`.`token`, `gateway`.`ativo`, `gateway`.`cliente_idcliente` FROM `gateway` WHERE `id` = $id;";
			$result = $vai->executeQuery($sql);			
		}
	
	while($dados = mysql_fetch_array($result)){
		$cliente = new Gateway();
		$cliente->setid(array('id' => $dados['id']));
		$cliente->setnome(array('nome' => $dados['nome']));
		$cliente->setemail(array('email' => $dados['email']));
		$cliente->settoken(array('token' => $dados['token']));
		$cliente->setativo(array('ativo' => $dados['ativo']));
		$cliente->setcliente_idcliente(array('cliente_idcliente' => $dados['cliente_idcliente']));		
		$arr[] = $cliente;
	}
	return $arr;
	}	

	public function Cad($nome, $email, $token, $ativo, $cliente_idcliente){
		
		$vai = new MySQLDB();
		
		if(!$ativo){
			$ativo = 0;
		}
		
		if($ativo == 1){
			$sql = "SELECT `id` FROM `gateway` WHERE `ativo`=1;";
			$result = $vai->ExecuteQuery($sql);
	
			while ($rows = mysql_fetch_object($result)) {
				$sql = "UPDATE `gateway` SET `ativo`=0 WHERE `id`=$rows->id;";
				$vai->executeQuery($sql);				
			}			
		}
		
		$sql = "INSERT INTO `gateway` (`nome`, `email`, `token`, `ativo`, `cliente_idcliente`) VALUES ('$nome', '$email', '$token', $ativo, $cliente_idcliente);";
		$vai->executeQuery($sql);
		header ("Location: gateway.php?vi=cad&ed=$cliente_idcliente");		
	}	

	public function Del($id, $cliente_idcliente){
		
		$vai = new MySQLDB();
		
		$sql = "SELECT * FROM `gateway` WHERE `id`=$id;";
		$result = $vai->ExecuteQuery($sql);
	
		while ($rows = mysql_fetch_object($result)) {
			if($rows->ativo){
				header ("Location: gateway.php?nu=$id&vi=ergate&ed=$cliente_idcliente");				
			}else{
				$sql = "DELETE FROM `gateway` WHERE `id` = $id;";
				$vai->ExecuteQuery($sql);
				header ("Location: gateway.php?vi=del&ed=$cliente_idcliente");				
			}
		}					
	}		
	
	public function Edit($id, $nome, $email, $token, $ativo, $cliente_idcliente){
		
		$vai = new MySQLDB();
		
		if($ativo == 1){
			$sql = "SELECT `id` FROM `gateway` WHERE `ativo`=1;";
			$result = $vai->ExecuteQuery($sql);
	
			while ($rows = mysql_fetch_object($result)) {
				$sql = "UPDATE `gateway` SET `ativo`=0 WHERE `id`=$rows->id;";
				$vai->executeQuery($sql);				
			}			
		}
		
		$sql = "UPDATE `gateway` SET `nome`='$nome', `email`='$email', `token`='$token', `ativo`=$ativo, `cliente_idcliente`=$cliente_idcliente WHERE `id`=$id;";
		$vai->executeQuery($sql);
		header ("Location: gateway.php?vi=edit&nu=$id&ed=$cliente_idcliente");		
	}	
	
}

?>