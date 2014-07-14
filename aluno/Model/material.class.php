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
	$vai = new MySQLDB();
	
	$sql = "SELECT `material`.`idmaterial`, `material`.`nome`, `material`.`endereco`, `material`.`descricao` FROM `material` 
			WHERE `material`.`aula_idaula` = $id;";

	$result = $vai->executeQuery($sql);
	
	while($dados = mysql_fetch_array($result)){
		$cliente = new Material();
		$cliente->setidmaterial(array('idmaterial' => $dados['idmaterial']));
		$cliente->setnome(array('nome' => $dados['nome']));
		$cliente->setendereco(array('endereco' => $dados['endereco']));
		$cliente->setdescricao(array('descricao' => $dados['descricao']));
		$arr[] = $cliente;
	}
	return $arr;
	}	
	
}

?>