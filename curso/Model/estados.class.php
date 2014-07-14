<?php 

class Estados{

	public $cod_estados;
	public $sigla;
	public $nome;
	
	protected function setcod_estados($cod_estados){
		$this->cod_estados = $cod_estados;
	}
	
	protected function setsigla($sigla){
		$this->sigla = $sigla;
	}
	
	protected function setnome($nome){
		$this->nome = $nome;
	}
	
	public function all($id_estados){
	
	if($id_estados == ''){
		$sql = "SELECT * FROM `estados`;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
	}else{
		$sql = "SELECT * FROM `estados` WHERE `id_estados` = $id_estados;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
	}
	while($dados = mysql_fetch_array($result)){
		$cliente = new Estados;
		$cliente->setcod_estados(array('cod_estados' => $dados['cod_estados']));
		$cliente->setsigla(array('sigla' => $dados['sigla']));
		$cliente->setnome(array('nome' => $dados['nome']));
		$arr[] = $cliente;
	}
	return $arr;
	}

}

?>