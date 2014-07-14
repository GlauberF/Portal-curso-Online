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
	public $cliente_idcliente;		
	public $date_in;	
	public $date_out;			
	public $adicional;		
	public $capa;		

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
	
	protected function setcliente_idcliente($cliente_idcliente){
		$this->cliente_idcliente = $cliente_idcliente;
	}	
	
	protected function setdate_in($date_in){
		$this->date_in = $date_in;
	}

	protected function setdate_out($date_out){
		$this->date_out = $date_out;
	}		

	protected function setadicional($adicional){
		$this->adicional = $adicional;
	}		
	
	protected function setcapa($capa){
		$this->capa = $capa;
	}	
	
	public function AulaVenda($id){

		$arr = array();	

		$vai = new MySQLDB();		
		
		$sql = "SELECT 
					`curso`.`idcurso`, 
					`curso`.`nome`, 
					`curso`.`capa`, 					
					`concurso`.`nome` as `concursoNome`,
					`curso`.`professor_idprofessor`, 
					`professor`.`nome` as `professorNome` 
					FROM `curso`
					INNER JOIN `concurso` ON `idconcurso`=`concurso_idconcurso`
					INNER JOIN `professor` ON `idprofessor`=`professor_idprofessor` 
					INNER JOIN `venda_curso` ON `venda_curso`.`curso_id`=`curso`.`idcurso`
					WHERE `venda_curso`.`venda_id` = $id;";

		$result = $vai->executeQuery($sql);
		
		while($dados = mysql_fetch_array($result)){
			$cliente = new Curso();
			$cliente->setidcurso(array('idcurso' => $dados['idcurso']));
			$cliente->setnome(array('nome' => $dados['nome']));
			$cliente->setconcursoNome(array('concursoNome' => $dados['concursoNome']));	
			$cliente->setprofessor_idprofessor(array('professor_idprofessor' => $dados['professor_idprofessor']));		
			$cliente->setprofessorNome(array('professorNome' => $dados['professorNome']));	
			$cliente->setcapa(array('capa' => $dados['capa']));				
			$arr[] = $cliente;
		}
		return $arr;
	}				
}

?>