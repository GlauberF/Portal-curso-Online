<?php

class Venda{

	public $id;
	public $nome;
	public $valor;
	public $capa;
	public $cliente_idcliente;
	public $cursoNome;
	public $concursoNome;	
	public $date_in;	
	public $date_out;			
	public $descricao;
	public $adicional;				
	
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
	
	protected function setcliente_idcliente($cliente_idcliente){
		$this->cliente_idcliente = $cliente_idcliente;
	}	
	
	protected function setcursoNome($cursoNome){
		$this->cursoNome = $cursoNome;
	}	

	protected function setconcursoNome($concursoNome){
		$this->concursoNome = $concursoNome;
	}	
	
	protected function setdate_in($date_in){
		$this->date_in = $date_in;
	}

	protected function setdate_out($date_out){
		$this->date_out = $date_out;
	}	

	protected function setdescricao($descricao){
		$this->descricao = $descricao;
	}		

	protected function setadicional($adicional){
		$this->adicional = $adicional;
	}			
	
	public function all($id, $cliente){

		$arr = array();	
			
		if($id == ''){
			$sql = "SELECT * FROM `venda` WHERE `venda`.`cliente_idcliente`=$cliente;";
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}else{
			$sql = "SELECT * FROM `venda` WHERE `venda`.`id`=$id;";
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}
		while($dados = mysql_fetch_array($result)){
			$cliente = new Venda();
			$cliente->setid(array('id' => $dados['id']));
			$cliente->setnome(array('nome' => $dados['nome']));
			$cliente->setvalor(array('valor' => $dados['valor']));		
			$cliente->setcapa(array('capa' => $dados['capa']));
			$cliente->setcliente_idcliente(array('cliente_idcliente' => $dados['cliente_idcliente']));		
			$cliente->setdate_in(array('date_in' => $dados['date_in']));
			$cliente->setdate_out(array('date_out' => $dados['date_out']));
			$cliente->setdescricao(array('descricao' => $dados['descricao']));
			$cliente->setadicional(array('adicional' => $dados['adicional']));												
			$arr[] = $cliente;
		}
		return $arr;
	}	
	
	public function allMany($id){

		$arr = array();	
			
		$sql = "SELECT `curso`.`idcurso` AS `id`, `curso`.`nome` AS `cursoNome`, `curso`.`valor`, `concurso`.`nome` AS `concursoNome` FROM `curso`
			INNER JOIN `concurso` ON `concurso`.`idconcurso`=`curso`.`concurso_idconcurso`
			INNER JOIN `venda_curso` ON `venda_curso`.`curso_id`=`curso`.`idcurso`
			WHERE `venda_curso`.`venda_id`=$id;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);

		while($dados = mysql_fetch_array($result)){
			$cliente = new Venda();
			$cliente->setid(array('id' => $dados['id']));			
			$cliente->setvalor(array('valor' => $dados['valor']));						
			$cliente->setcursoNome(array('cursoNome' => $dados['cursoNome']));		
			$cliente->setconcursoNome(array('concursoNome' => $dados['concursoNome']));					
			$arr[] = $cliente;
		}
		return $arr;
	}		

	public function Cad($nome, $idcurso, $valor, $capa, $cliente_idcliente, $date_in, $date_out, $descricao, $adicional){
		
		$vai = new MySQLDB();

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
				header ("Location: vendas.php?vi=erroe&error=$erro&ed=$cliente_idcliente");
			}else{
				include("../../plugins/SimpleImage/SimpleImage.php");
		        $image = new SimpleImage();
		        $image->load($nova_capa);
				$image->cutFromCenter(270, 200);
		    	$image->save($nova_capa);				
			}
		}
		
		$sql = "INSERT INTO `venda` (`nome`, `valor`, `capa`, `cliente_idcliente`, `date_in`, `date_out`, `descricao`, `adicional`, `pacote`) VALUES ('$nome', '$valor', '$nova_capa', $cliente_idcliente, '$date_in', '$date_out', '$descricao', '$adicional', 1);";
		$vai->executeQuery($sql);
		$venda = mysql_insert_id();
		foreach($idcurso as $curso => $valorCurso){ 
			$sql2 = "INSERT INTO `venda_curso` (`venda_id`, `curso_id`) VALUES ($venda, $valorCurso);";	
			$vai->executeQuery($sql2);		
		}	

		header ("Location: vendas.php?vi=cad&ed=$cliente_idcliente");
	}	
	
	public function Edit($id, $nome, $idcurso, $valor, $cliente_idcliente, $date_in, $date_out, $descricao, $adicional){
		
		$vai = new MySQLDB();
		
		$sql = "UPDATE `venda` SET `nome`='$nome', `valor`='$valor', `date_in`='$date_in', `date_out`='$date_out', `descricao`='$descricao', `adicional`='$adicional', `pacote`=1 WHERE `id`=$id;";
		$vai->executeQuery($sql);
		
		$sql = "DELETE FROM `venda_curso` WHERE `venda_id` = $id;";
		$vai->ExecuteQuery($sql);		
		
		foreach($idcurso as $curso => $valorCurso){ 
			$sql2 = "INSERT INTO `venda_curso` (`venda_id`, `curso_id`) VALUES ($id, $valorCurso);";	
			$vai->executeQuery($sql2);		
		}			
		
		header ("Location: edit_venda.php?vi=edit&nu=$id&ed=$cliente_idcliente");
	
	}	

	public function Del($id, $cliente){
		
		$vai = new MySQLDB();
		
		$sql = "SELECT `capa` FROM `venda` WHERE `id` = $id;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		if ($objeto->capa != "../../img/sem_imagem.gif"){
			@unlink("$objeto->capa");
		}		
		
		$sql = "DELETE FROM `venda_curso` WHERE `venda_id` = $id;";
		$vai->ExecuteQuery($sql);				
		
		$sql2 = "DELETE FROM `venda` WHERE `id` = $id;";
		$vai->ExecuteQuery($sql2);
		header ("Location: vendas.php?vi=del&ed=$cliente");
	}	

	public function Capa($id, $capa, $cliente){
		
		$vai = new MySQLDB();

		$sql = "SELECT `capa` FROM `venda` WHERE `id` = $id;";
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
				header ("Location: vendas.php?vi=erroe&error=$erro&ed=$cliente");
			}else{
				include("../../plugins/SimpleImage/SimpleImage.php");
		        $image = new SimpleImage();
		        $image->load($nova_capa);
				$image->cutFromCenter(270, 200);
		    	$image->save($nova_capa);				
			}
		}		
		
		$sql = "UPDATE `venda` SET `capa`='$nova_capa' WHERE `id`=$id;";
		$vai->executeQuery($sql);
		
		header ("Location: edit_venda.php?vi=edit&nu=$id&ed=$cliente");
	
	}	
	
}

?>