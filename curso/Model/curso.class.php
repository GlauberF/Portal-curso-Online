<?php

class Curso{

	public $idcurso;
	public $nome;
	public $valor;
	public $descricao;
	public $concurso_idconcurso;
	public $concursoNome;	
	public $professor_idprofessor;	
	public $professorNome;		

	protected function setidcurso($idcurso){
		$this->idcurso = $idcurso;
	}

	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setvalor($valor){
		$this->valor = $valor;
	}

	protected function setdescricao($descricao){
		$this->descricao = $descricao;
	}
	
	protected function setconcurso_idconcurso($concurso_idconcurso){
		$this->concurso_idconcurso = $concurso_idconcurso;
	}		

	protected function setconcursoNome($concursoNome){
		$this->concursoNome = $concursoNome;
	}		

	protected function setprofessor_idprofessor($professor_idprofessor){
		$this->professor_idprofessor = $professor_idprofessor;
	}	

	protected function setprofessorNome($professorNome){
		$this->professorNome = $professorNome;
	}	
	
	public function all($id){

	$arr = array();	
		
	if($id == ''){
		$sql = "SELECT `curso`.`idcurso`, `curso`.`nome`, `curso`.`valor`, `curso`.`descricao`, `curso`.`concurso_idconcurso`, `concurso`.`nome` as `concursoNome`, `curso`.`professor_idprofessor`, `professor`.`nome` as `professorNome` FROM `curso` 
		INNER JOIN `concurso` ON `idconcurso`=`concurso_idconcurso`
		INNER JOIN `professor` ON `idprofessor`=`professor_idprofessor`;";		
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}else{
		$sql = "SELECT `curso`.`idcurso`, `curso`.`nome`, `curso`.`valor`, `curso`.`descricao`, `curso`.`concurso_idconcurso`, `concurso`.`nome` as `concursoNome`, `curso`.`professor_idprofessor`, `professor`.`nome` as `professorNome` FROM `curso` 
		INNER JOIN `concurso` ON `idconcurso`=`concurso_idconcurso`
		INNER JOIN `professor` ON `idprofessor`=`professor_idprofessor` WHERE `idcurso` = $id;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}
	while($dados = mysql_fetch_array($result)){
		$cliente = new Curso();
		$cliente->setidcurso(array('idcurso' => $dados['idcurso']));
		$cliente->setnome(array('nome' => $dados['nome']));
		$cliente->setvalor(array('valor' => $dados['valor']));
		$cliente->setdescricao(array('descricao' => $dados['descricao']));
		$cliente->setconcurso_idconcurso(array('concurso_idconcurso' => $dados['concurso_idconcurso']));		
		$cliente->setconcursoNome(array('concursoNome' => $dados['concursoNome']));	
		$cliente->setprofessor_idprofessor(array('professor_idprofessor' => $dados['professor_idprofessor']));		
		$cliente->setprofessorNome(array('professorNome' => $dados['professorNome']));							
		$arr[] = $cliente;
	}
	return $arr;
	}	

	public function Cad($nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor){
		$sql = "INSERT INTO `curso` (`nome`, `valor`, `descricao`, `concurso_idconcurso`, `professor_idprofessor`) VALUES ('$nome', '$valor', '$descricao', $concurso_idconcurso, $professor_idprofessor);";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: curso.php?vi=cad");
	}	
	
	public function Edit($idcurso, $nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor){
		$sql = "UPDATE `curso` SET `nome`='$nome', `valor`='$valor', `concurso_idconcurso`=$concurso_idconcurso, `professor_idprofessor`=$professor_idprofessor WHERE `idcurso`=$idcurso;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: curso.php?vi=edit");
	}		
	
	public function Del($id){
		$sql = "DELETE FROM `curso` WHERE `idcurso` = $id;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: curso.php?vi=del");
	}		
	
}

?>