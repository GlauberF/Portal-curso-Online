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
	
	public function all($id, $cliente){

		$arr = array();	
			
		if($id == ''){
			$sql = "SELECT `curso`.`idcurso`, `curso`.`nome`, `curso`.`valor`, `curso`.`descricao`, `curso`.`concurso_idconcurso`, `curso`.`cliente_idcliente`, `curso`.`date_in`, `curso`.`date_out`, `curso`.`adicional`, `curso`.`capa`, `concurso`.`nome` as `concursoNome`, `curso`.`professor_idprofessor`, `professor`.`nome` as `professorNome` FROM `curso` 
			INNER JOIN `concurso` ON `idconcurso`=`concurso_idconcurso`
			INNER JOIN `professor` ON `idprofessor`=`professor_idprofessor` WHERE `curso`.`cliente_idcliente`=$cliente;";		
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}else{
			$sql = "SELECT `curso`.`idcurso`, `curso`.`nome`, `curso`.`valor`, `curso`.`descricao`, `curso`.`concurso_idconcurso`, `curso`.`cliente_idcliente`, `curso`.`date_in`, `curso`.`date_out`, `curso`.`adicional`, `curso`.`capa`, `concurso`.`nome` as `concursoNome`, `curso`.`professor_idprofessor`, `professor`.`nome` as `professorNome` FROM `curso` 
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
			$cliente->setcliente_idcliente(array('cliente_idcliente' => $dados['cliente_idcliente']));
			$cliente->setcapa(array('capa' => $dados['capa']));				
			$cliente->setdate_in(array('date_in' => $dados['date_in']));
			$cliente->setdate_out(array('date_out' => $dados['date_out']));
			$cliente->setadicional(array('adicional' => $dados['adicional']));								
			$arr[] = $cliente;
		}
		return $arr;
	}	

	public function Cad($nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente, $date_in, $date_out, $capa, $adicional){
		
		if(empty($capa['name'])){
			$nova_capa = "../../img/sem_imagem.gif";
		}else{
			$nome_original = $capa['name'];
			list($nome_arquivo, $extensao_arquivo) = explode(".", $nome_original);
			$ds90 = str_replace(" ", "_", $nome_arquivo);
			$numero_reg = rand(1,999);
			$nome_aleatorio_arquivo = $ds90 . $numero_reg;
			$nova_capa = "../../img/" . $nome_aleatorio_arquivo . "." . $extensao_arquivo;
			if (!move_uploaded_file($capa['tmp_name'], "./$nova_capa")) {
				$erro .= "Erro no envio da imagem.<br />";
				header ("Location: curso.php?vi=erroe&error=$erro&ed=$cliente_idcliente");
			}else{
				include("../../plugins/SimpleImage/SimpleImage.php");
		        $image = new SimpleImage();
		        $image->load($nova_capa);
				$image->cutFromCenter(270, 200);
		    	$image->save($nova_capa);				
			}
		}		

		$sql = "INSERT INTO `curso` (`nome`, `valor`, `descricao`, `concurso_idconcurso`, `professor_idprofessor`, `cliente_idcliente`, `date_in`, `date_out`, `capa`, `adicional`) VALUES ('$nome', '$valor', '$descricao', $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente, '$date_in', '$date_out', '$nova_capa', '$adicional');";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		$curso = mysql_insert_id();
		if($valor != 0.00){		
			$sql2 = "INSERT INTO `venda` (`nome`, `valor`, `capa`, `cliente_idcliente`, `date_in`, `date_out`, `descricao`, `adicional`, `pacote`) VALUES ('$nome', '$valor', '$nova_capa', $cliente_idcliente, '$date_in', '$date_out', '$descricao', '$adicional', 0);";
			$vai->executeQuery($sql2);
			$venda = mysql_insert_id();
			
			$sql3 = "INSERT INTO `venda_curso` (`venda_id`, `curso_id`) VALUES ($venda, $curso);";	
			$vai->executeQuery($sql3);		
		}
		
		header ("Location: curso.php?vi=cad&ed=$cliente_idcliente");
	}	
	
	public function Edit($idcurso, $nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente, $date_in, $date_out, $adicional){
		$sql = "UPDATE `curso` SET `nome`='$nome', `valor`='$valor', `concurso_idconcurso`=$concurso_idconcurso, `professor_idprofessor`=$professor_idprofessor, `cliente_idcliente`=$cliente_idcliente, `date_in`='$date_in', `date_out`='$date_out', `adicional`='$adicional' WHERE `idcurso`=$idcurso;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: curso.php?vi=edit&nu=$idcurso&ed=$cliente_idcliente");
	}		
	
	public function Del($id, $cliente){
		
		$vai = new MySQLDB();
		
		$sql = "SELECT `capa` FROM `curso` WHERE `idcurso` = $id;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		if ($objeto->capa != "../../img/sem_imagem.gif"){
			@unlink("$objeto->capa");
		}			
		
		$sql = "DELETE FROM `curso` WHERE `idcurso` = $id;";
		$vai->ExecuteQuery($sql);
		
		header ("Location: curso.php?vi=del&ed=$cliente");
	}		
	
	public function CapaCurso($id, $capa, $cliente){
		
		$vai = new MySQLDB();
		
		$sql = "SELECT `capa` FROM `curso` WHERE `idcurso` = $id;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		if ($objeto->capa != "../../img/sem_imagem.gif"){
			@unlink("$objeto->capa");
		}		

		if(empty($capa['name'])){
			$nova_capa = "../../img/sem_imagem.gif";
		}else{
			$nome_original = $capa['name'];
			list($nome_arquivo, $extensao_arquivo) = explode(".", $nome_original);
			$ds90 = str_replace(" ", "_", $nome_arquivo);
			$numero_reg = rand(1,999);
			$nome_aleatorio_arquivo = $ds90 . $numero_reg;
			$nova_capa = "../../img/" . $nome_aleatorio_arquivo . "." . $extensao_arquivo;
			if (!move_uploaded_file($capa['tmp_name'], "./$nova_capa")) {
				$erro .= "Erro no envio da imagem.<br />";
				header ("Location: curso.php?vi=erroe&error=$erro&ed=$cliente");
			}else{
				include("../../plugins/SimpleImage/SimpleImage.php");
		        $image = new SimpleImage();
		        $image->load($nova_capa);
				$image->cutFromCenter(270, 200);
		    	$image->save($nova_capa);				
			}
		}		
		
		$sql = "UPDATE `curso` SET `capa`='$nova_capa' WHERE `idcurso`=$id;";
		$vai->executeQuery($sql);

		header ("Location: curso.php?vi=edit&nu=$id&ed=$cliente");
	
	}		
	
}

?>