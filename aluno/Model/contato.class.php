<?php

class Contato {
	
	public $id_contato;
	public $assunto;
	public $idclienteid;
	public $nomecliente;	
	public $id_user;	
	public $texto;	
	public $countt;	
	public $novo;							
	public $type;								
		
	protected function setid_contato($id_contato){
		$this->id_contato = $id_contato;
	}	
	
	protected function setassunto($assunto){
		$this->assunto = $assunto;
	}

	protected function settexto($texto){
		$this->texto = $texto;
	}

	protected function setidclienteid($idclienteid){
		$this->idclienteid = $idclienteid;
	}	

	protected function setnomecliente($nomecliente){
		$this->nomecliente = $nomecliente;
	}		
	
	protected function setid_user($id_user){
		$this->id_user = $id_user;
	}		
	
	protected function setnovo($novo){
		$this->novo = $novo;
	}	
	
	protected function setcountt($countt){
		$this->countt = $countt;
	}			
	
	protected function settype($type){
		$this->type = $type;
	}				
	
	public function all($id, $type, $id_user){
		
		if($id == ""){
			$sql = "SELECT `id_contato`, `assunto`, `idclienteid`, `id_user`, `novo`, `texto`, `type`, `nomecliente` FROM `contato` INNER JOIN `cliente` ON `idcliente`=`idclienteid` WHERE `type`=$type AND `id_user`=$id_user ORDER BY `id_contato` ASC;";
			$vai = new MySQLDB();
			$result = $vai->ExecuteQuery($sql);
		}else{	
			$sql = "SELECT `id_contato`, `assunto`, `idclienteid`, `id_user`, `novo`, `texto`, `type`, `nomecliente` FROM `contato` INNER JOIN `cliente` ON `idcliente`=`idclienteid` WHERE `id_contato` = $id;";
			$vai = new MySQLDB();
			$result = $vai->ExecuteQuery($sql);
		}
		while($dados = mysql_fetch_array($result)){
			$cliente = new Contato();
			$cliente->setid_contato(array('id_contato' => $dados['id_contato']));
			$cliente->setassunto(array('assunto' => $dados['assunto']));
			$cliente->settexto(array('texto' => $dados['texto']));
			$cliente->setid_estabelecimento_id(array('id_estabelecimento_id' => $dados['id_estabelecimento_id']));
			$cliente->setnome_estabelecimento(array('nome_estabelecimento' => $dados['nome_estabelecimento']));			
			$cliente->setid_usuario_admin_id(array('id_usuario_admin_id' => $dados['id_usuario_admin_id']));			
			$cliente->setnovo(array('novo' => $dados['novo']));
			$cliente->settype(array('type' => $dados['type']));																		
	
			$arr[] = $cliente;
		}

		return $arr;
	}
	
	public function Count($id_user){
		
		$sql = "SELECT COUNT(`id_contato`) AS countt FROM `contato` where `novo` = 1 AND `type` = 1 AND `id_user`=$id_user;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		while($dados = mysql_fetch_array($result)){
			$cliente = new Contato();
			$cliente->setcountt(array('countt' => $dados['countt']));
			$arr[] = $cliente;
		}

		return $arr;
	}	
	
	public function intoContato($assunto, $id_estabelecimento_id, $id_usuario_admin_id, $texto){
	   
		$sql = "INSERT INTO `contato` (`assunto`, `id_estabelecimento_id`, `id_usuario_admin_id`, `texto`, `novo`, `type`) VALUES ('$assunto', $id_estabelecimento_id, '$id_usuario_admin_id', '$texto', 1, 0);";
		$vai = new MySQLDB(); 
		$vai->ExecuteQuery($sql);
		header ("Location: contato.php?vi=contato_enviado");
	}	
	
	public function deletecontact($nu){
		
		$sql = "DELETE FROM `contato` WHERE `id_contato`=$nu;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: contato.php?vi=del_contato");			
	}
	
	public function read($id){
		$sql = "UPDATE `contato` SET `novo` = 0 where `id_contato`=$id;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: novo_contato.php?id=$id");		
	}
}

?>