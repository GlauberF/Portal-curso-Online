<?php

class Venda{

	public $id;
	public $nome;
	public $valor;
	public $capa;
	public $concurso_idconcurso;

	
	protected function setid($id){
		$this->id = $id;
	}

	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setvalor($valor){
		$this->valor = $valor;
	}

	protected function setcapa($capa){
		$this->capa = $capa;
	}

	protected function setconcurso_idconcurso($concurso_idconcurso){
		$this->concurso_idconcurso = $concurso_idconcurso;
	}

	public function all($id){

	$arr = array();	
		
	if($id == ''){
		$sql = "SELECT `venda`.`id`, `venda`.`nome`, `aula`.`endereco_video`, `aula`.`descricao`, `aula`.`curso_idcurso`, `aula`.`cliente_idcliente`, `curso`.`nome` AS `disciplina` FROM `aula` 
		INNER JOIN `curso` ON `curso_idcurso`=`idcurso`;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}else{
		$sql = "SELECT `aula`.`idaula`, `aula`.`nome`, `aula`.`endereco_video`, `aula`.`descricao`, `aula`.`curso_idcurso`, `aula`.`cliente_idcliente`, `curso`.`nome` AS `disciplina` FROM `aula` 
		INNER JOIN `curso` ON `curso_idcurso`=`idcurso` WHERE `aula`.`idaula` = $id;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}
	while($dados = mysql_fetch_array($result)){
		$cliente = new Aula();
		$cliente->setidaula(array('idaula' => $dados['idaula']));
		$cliente->setnome(array('nome' => $dados['nome']));
		$cliente->setendereco_video(array('endereco_video' => $dados['endereco_video']));
		$cliente->setdescricao(array('descricao' => $dados['descricao']));
		$cliente->setcurso_idcurso(array('curso_idcurso' => $dados['curso_idcurso']));
		$cliente->setcliente_idcliente(array('cliente_idcliente' => $dados['cliente_idcliente']));		
		$cliente->setdisciplina(array('disciplina' => $dados['disciplina']));			
		$arr[] = $cliente;
	}
	return $arr;
	}	

	public function Cad($nome, $endereco_video, $descricao, $curso_idcurso, $cliente_idcliente){
		$sql = "INSERT INTO `aula` (`nome`, `endereco_video`, `descricao`, `curso_idcurso`, `cliente_idcliente`) VALUES ('$nome', '$endereco_video', '$descricao', $curso_idcurso, $cliente_idcliente);";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: aula.php?vi=cad");
	}	
	
	public function Edit($idaula, $nome, $descricao, $curso_idcurso){
		$sql = "UPDATE `aula` SET `nome`='$nome', `descricao`='$descricao', `curso_idcurso`=$curso_idcurso WHERE `idaula`=$idaula;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: vi_aula.php?vi=edit&ed=$idaula");
	}	

	public function Del($id){
		$sql = "DELETE FROM `aula` WHERE `idaula` = $id;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: aula.php?vi=del");
	}		
	
}

?>