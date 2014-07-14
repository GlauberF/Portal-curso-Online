<?php 

class Cidades{

	public $estados_cod_estados;
	public $cod_cidades;
	public $nome;
	public $cep;
	public $cidade;
	public $estado;
	
	protected function setestados_cod_estados($estados_cod_estados){
	$this->estados_cod_estados = $estados_cod_estados;
	}
	
	protected function setcod_cidades($cod_cidades){
	$this->cod_cidades = $cod_cidades;
	}
	
	protected function setnome($nome){
	$this->nome = $nome;
	}
	
	protected function setcep($cep){
	$this->cep = $cep;
	}

	protected function setcidade($cidade){
	$this->cidade = $cidade;
	}	

	protected function setestado($estado){
	$this->estado = $estado;
	}		
	
	public function all($id_cidades){
	
		if($id_cidades == ''){
			$sql = "SELECT * FROM `cidades`;";
			$vai = new MySQLDB();
			$result = $vai->ExecuteQuery($sql);
			while($dados = mysql_fetch_array($result)){
				$cliente = new Cidades;
				$cliente->setestados_cod_estados(array('estados_cod_estados' => $dados['estados_cod_estados']));
				$cliente->setcod_cidades(array('cod_cidades' => $dados['cod_cidades']));
				$cliente->setnome(array('nome' => $dados['nome']));
				$cliente->setcep(array('cep' => $dados['cep']));
				$arr[] = $cliente;
			}
			return $arr;			
		}else{
			$sql = "SELECT `estados_cod_estados`, `cod_cidades`, `cidades`.`nome` AS cidade, `estados`.`nome` AS estado FROM `cidades` 
					INNER JOIN `estados` ON `cod_estados` = `estados_cod_estados`
					WHERE `cod_cidades` = $id_cidades;";
			$vai = new MySQLDB();
			$result = $vai->ExecuteQuery($sql);
			while($dados = mysql_fetch_array($result)){
				$cliente = new Cidades;
				$cliente->setestados_cod_estados(array('estados_cod_estados' => $dados['estados_cod_estados']));
				$cliente->setcod_cidades(array('cod_cidades' => $dados['cod_cidades']));
				$cliente->setcidade(array('cidade' => $dados['cidade']));
				$cliente->setestado(array('estado' => $dados['estado']));
				$arr[] = $cliente;
			}
			return $arr;			
		}
	}

}

?>