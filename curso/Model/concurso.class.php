<?php

class Concurso{

	public $idconcurso;
	public $nome;
	public $descricao;
	public $remuneracao;
	public $vagas;
	public $cliente_idcliente;	

	protected function setidconcurso($idconcurso){
		$this->idconcurso = $idconcurso;
	}

	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setdescricao($descricao){
		$this->descricao = $descricao;
	}

	protected function setremuneracao($remuneracao){
		$this->remuneracao = $remuneracao;
	}

	protected function setvagas($vagas){
		$this->vagas = $vagas;
	}

	protected function setcliente_idcliente($cliente_idcliente){
		$this->cliente_idcliente = $cliente_idcliente;
	}		

	public function all($id){

	$arr = array();	
		
	if($id == ''){
		$sql = "SELECT * FROM `concurso`;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}else{
		$sql = "SELECT `idconcurso`, `nome`, `descricao`, `remuneracao`, `vagas`, `cliente_idcliente` FROM `concurso` WHERE `idconcurso` = $id;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}
	
	while($dados = mysql_fetch_array($result)){
		$cliente = new Concurso();
		$cliente->setidconcurso(array('idconcurso' => $dados['idconcurso']));
		$cliente->setnome(array('nome' => $dados['nome']));
		$cliente->setdescricao(array('descricao' => $dados['descricao']));
		$cliente->setremuneracao(array('remuneracao' => $dados['remuneracao']));
		$cliente->setvagas(array('vagas' => $dados['vagas']));
		$cliente->setcliente_idcliente(array('cliente_idcliente' => $dados['cliente_idcliente']));		
		$arr[] = $cliente;
	}
	return $arr;
	}	

	public function Cad($nome, $descricao, $remuneracao, $vagas, $cliente_idcliente){
		$sql = "INSERT INTO `concurso` (`nome`, `descricao`, `remuneracao`, `vagas`, `cliente_idcliente`) VALUES ('$nome', '$descricao', '$remuneracao', $vagas, $cliente_idcliente);";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: concurso.php?vi=cad");
	}	
	
	public function Edit($idconcurso, $nome, $descricao, $remuneracao, $vagas, $cliente_idcliente){
		$sql = "UPDATE `concurso` SET `nome`='$nome', `descricao`='$descricao', `remuneracao`='$remuneracao', `vagas`=$vagas WHERE `idconcurso`=$idconcurso;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: concurso.php?vi=edit");
	}	

	public function Del($id){
		$sql = "DELETE FROM `concurso` WHERE `idconcurso` = $id;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: concurso.php?vi=del");
	}	
	
}

?>