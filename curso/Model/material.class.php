<?php

class Material{

	public $idmaterial;
	public $nome;
	public $endereco;
	public $descricao;
	public $aula_idaula;
	public $aulaNome;	
	
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
	
	public function all($id){

	$arr = array();	
		
	if($id == ''){
		$sql = "SELECT `material`.`idmaterial`, `material`.`nome`, `material`.`endereco`, `material`.`descricao`, `material`.`aula_idaula`, `aula`.`nome`  AS `aulaNome` FROM `material` 
		INNER JOIN `aula` ON `aula_idaula`=`idaula`;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}else{
		$sql = "SELECT `material`.`idmaterial`, `material`.`nome`, `material`.`endereco`, `material`.`descricao`, `material`.`aula_idaula`, `aula`.`nome`  AS `aulaNome` FROM `material` 
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
		$arr[] = $cliente;
	}
	return $arr;
	}	

	public function Cad($nome, $endereco, $descricao, $aula_idaula){
		
		$nome_original = str_replace(" ", "_", $endereco['name']);
		list($nome_arquivo, $extensao_arquivo) = explode(".", $nome_original);

		$upload = "../../material/" . $_SESSION['FolderCliente'] . "/" . $nome_arquivo . "." . $extensao_arquivo;

		if (!move_uploaded_file($endereco['tmp_name'], "./$upload")) {
			$erro .= "Erro no envio do arquivo.<br />";
			header ("Location: material.php?vi=upload&error=$erro");
		}else{				
			$sql = "INSERT INTO `material` (`nome`, `endereco`, `descricao`, `aula_idaula`) VALUES ('$nome', '$nome_original', '$descricao', $aula_idaula);";
			$vai = new MySQLDB();
			$vai->executeQuery($sql);
			header ("Location: material.php?vi=cad");
		}
	}	
	
	public function Edit($idmaterial, $nome, $descricao, $aula_idaula){
		$sql = "UPDATE `material` SET `nome`='$nome', `descricao`='$descricao', `aula_idaula`=$aula_idaula WHERE `idmaterial`=$idmaterial;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: material.php?vi=edit&ed=$idmaterial");
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

	public function ChangeArq($idmaterial, $endereco){
		
		$sql = "SELECT `endereco` FROM `material` WHERE `idmaterial` = $idmaterial;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		$del = "../../material/" . $_SESSION['FolderCliente'] . "/" . $objeto->endereco;
		@unlink("$del");		
		
		$nome_original = str_replace(" ", "_", $endereco['name']);
		list($nome_arquivo, $extensao_arquivo) = explode(".", $nome_original);

		$upload = "../../material/" . $_SESSION['FolderCliente'] . "/" . $nome_arquivo . "." . $extensao_arquivo;

		if (!move_uploaded_file($endereco['tmp_name'], "./$upload")) {
			$erro .= "Erro no envio do arquivo.<br />";
			header ("Location: material.php?vi=upload&error=$erro");
		}else{				
			$sql = "UPDATE `material` SET `endereco`='$nome_original' WHERE `idmaterial`=$idmaterial;";
			$vai = new MySQLDB();
			$vai->executeQuery($sql);
			header ("Location: material.php?vi=Arquivo");
		}
	}	
	
}

?>