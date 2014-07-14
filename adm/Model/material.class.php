<?php

class Material{

	public $idmaterial;
	public $nome;
	public $endereco;
	public $descricao;
	public $aula_idaula;
	public $aulaNome;	
	public $cliente_idcliente;		
	
	protected function setidmaterial($idmaterial){
		$this->idmaterial = $idmaterial;
	}

	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setendereco($endereco){
		$this->endereco = $endereco;
	}

	protected function setdescricao($descricao){
		$this->descricao = $descricao;
	}

	protected function setaula_idaula($aula_idaula){
		$this->aula_idaula = $aula_idaula;
	}
	
	protected function setaulaNome($aulaNome){
		$this->aulaNome = $aulaNome;
	}	
	
	protected function setcliente_idcliente($cliente_idcliente){
		$this->cliente_idcliente = $cliente_idcliente;
	}		
	
	public function all($id, $cliente){

	$arr = array();	
		
	if(is_null($id)){
		$sql = "SELECT `material`.`idmaterial`, `material`.`nome`, `material`.`endereco`, `material`.`descricao`, `material`.`aula_idaula`, `material`.`cliente_idcliente`, `aula`.`nome`  AS `aulaNome` FROM `material` 
		INNER JOIN `aula` ON `aula_idaula`=`idaula` WHERE `material`.`cliente_idcliente`=$cliente;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}else{
		$sql = "SELECT `material`.`idmaterial`, `material`.`nome`, `material`.`endereco`, `material`.`descricao`, `material`.`cliente_idcliente`, `material`.`aula_idaula`, `aula`.`nome`  AS `aulaNome` FROM `material` 
		INNER JOIN `aula` ON `aula_idaula`=`idaula` WHERE `material`.`idmaterial` = $id;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}
	while($dados = mysql_fetch_array($result)){
		$cliente = new Material();
		$cliente->setidmaterial(array('idmaterial' => $dados['idmaterial']));
		$cliente->setnome(array('nome' => $dados['nome']));
		$cliente->setendereco(array('endereco' => $dados['endereco']));
		$cliente->setdescricao(array('descricao' => $dados['descricao']));
		$cliente->setaula_idaula(array('aula_idaula' => $dados['aula_idaula']));
		$cliente->setaulaNome(array('aulaNome' => $dados['aulaNome']));
		$cliente->setcliente_idcliente(array('cliente_idcliente' => $dados['cliente_idcliente']));		
		$arr[] = $cliente;
	}
	return $arr;
	}	

	public function Cad($nome, $endereco, $descricao, $aula_idaula, $cliente_idcliente, $folder){
		
		$nome_original = str_replace(" ", "_", $endereco['name']);
		list($nome_arquivo, $extensao_arquivo) = explode(".", $nome_original);

		$upload = "../../material/" . $folder . "/" . $nome_arquivo . "." . $extensao_arquivo;

		if (!move_uploaded_file($endereco['tmp_name'], "./$upload")) {
			$erro .= "Erro no envio do arquivo.<br />";
			header ("Location: material.php?error=$erro&ed=$cliente_idcliente");
		}else{				
			$sql = "INSERT INTO `material` (`nome`, `endereco`, `descricao`, `aula_idaula`, `cliente_idcliente`) VALUES ('$nome', '$nome_original', '$descricao', $aula_idaula, $cliente_idcliente);";
			$vai = new MySQLDB();
			$vai->executeQuery($sql);
			header ("Location: material.php?vi=cad&ed=$cliente_idcliente");
		}
	}	
	
	public function Edit($idmaterial, $nome, $descricao, $aula_idaula, $cliente_idcliente){
		$sql = "UPDATE `material` SET `nome`='$nome', `descricao`='$descricao', `aula_idaula`=$aula_idaula WHERE `idmaterial`=$idmaterial;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: material.php?vi=edit&nu=$idmaterial&ed=$cliente_idcliente");
	}	

	
	public function Del($id){
		
		$sql = "SELECT `endereco` FROM `material` WHERE `idmaterial` = $id;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		$del = "../../material/" . $_SESSION['FolderCliente'] . "/" . $objeto->endereco;
		@unlink("$del");
		
		$sql = "DELETE FROM `material` WHERE `idmaterial` = $id;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: material.php?vi=del");
	}

	public function ChangeArq($idmaterial, $endereco, $cliente, $folder){
		
		$sql = "SELECT `endereco` FROM `material` WHERE `idmaterial` = $idmaterial;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		$del = "../../material/" . $folder . "/" . $objeto->endereco;
		@unlink("$del");		
		
		$nome_original = str_replace(" ", "_", $endereco['name']);
		list($nome_arquivo, $extensao_arquivo) = explode(".", $nome_original);

		$upload = "../../material/" . $folder . "/" . $nome_arquivo . "." . $extensao_arquivo;

		if (!move_uploaded_file($endereco['tmp_name'], "./$upload")) {
			$erro .= "Erro no envio do arquivo.<br />";
			header ("Location: material.php?error=$erro&ed=$cliente");
		}else{				
			$sql = "UPDATE `material` SET `endereco`='$nome_original' WHERE `idmaterial`=$idmaterial;";
			$vai = new MySQLDB();
			$vai->executeQuery($sql);
			header ("Location: material.php?vi=Arquivo&nu=$idmaterial&ed=$cliente");
		}
	}	
	
}

?>