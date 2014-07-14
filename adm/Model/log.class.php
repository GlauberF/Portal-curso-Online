<?php

class Log {

	public $id_log;
	public $descricao_log;
	public $data;
	public $tipo_log;

	protected function setid_log($id_log){
		$this->id_log = $id_log;
	}

	protected function setdescricao_log($descricao_log){
		$this->descricao_log = $descricao_log;
	}

	protected function setdata($data){
		$this->data = $data;
	}

	protected function settipo_log($tipo_log){
		$this->tipo_log = $tipo_log;
	}

	public function all($log){

		if($log == "Login"){
			$sql = "SELECT * FROM `log` WHERE `tipo_log` = '$log' ORDER BY `id_log` DESC;";
			$vai = new MySQLDB();
			$result = $vai->ExecuteQuery($sql);
		}else{
			$sql = "SELECT * FROM `log` WHERE `tipo_log` = '$log' ORDER BY `id_log` DESC;";
			$vai = new MySQLDB();
			$result = $vai->ExecuteQuery($sql);
		}
		while($dados = mysql_fetch_array($result)){
			$cliente = new Log();
			$cliente->setid_log(array('id_log' => $dados['id_log']));
			$cliente->setdescricao_log(array('descricao_log' => $dados['descricao_log']));
			$cliente->setdata(array('data' => $dados['data']));
			$cliente->settipo_log(array('tipo_log' => $dados['tipo_log']));
			$arr[] = $cliente;
		}

		return $arr;
	}

}

?>