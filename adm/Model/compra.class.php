<?php

class Compra{

	public $id;
	public $data;
	public $modo_pag;
	public $valor;
	public $status;
	public $aluno_idaluno;	
	public $notification_id;	
	public $cliente_idcliente;		
	public $nome;		
	public $email;			
	
	protected function setid($id){
		$this->id = $id;
	}

	protected function setdata($data){
		$this->data = $data;
	}

	protected function setmodo_pag($modo_pag){
		$this->modo_pag = $modo_pag;
	}

	protected function setvalor($valor){
		$this->valor = $valor;
	}

	protected function setstatus($status){
		$this->status = $status;
	}

	protected function setaluno_idaluno($aluno_idaluno){
		$this->aluno_idaluno = $aluno_idaluno;
	}	

	protected function setnotification_id($notification_id){
		$this->notification_id = $notification_id;
	}		
	
	protected function setcliente_idcliente($cliente_idcliente){
		$this->cliente_idcliente = $cliente_idcliente;
	}		
	
	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setemail($email){
		$this->email = $email;
	}	
	
	public function all($id, $cliente){

		$arr = array();	
		if(is_null($id)){			
			$sql = "SELECT `compra`.`id`, `compra`.`data`, `compra`.`modo_pag`, `compra`.`valor`, `compra`.`status`, `compra`.`notification_id`, `compra`.`cliente_idcliente`, `aluno`.`nome`, `aluno`.`email`
					FROM `compra` INNER JOIN `aluno` ON `aluno`.`idaluno`=`compra`.`aluno_idaluno`
					WHERE `compra`.`cliente_idcliente` = $cliente;";
		}else{
			$sql = "SELECT `compra`.`id`, `compra`.`data`, `compra`.`modo_pag`, `compra`.`valor`, `compra`.`status`, `compra`.`notification_id`, `compra`.`cliente_idcliente`, `aluno`.`nome`, `aluno`.`email`
					FROM `compra` INNER JOIN `aluno` ON `aluno`.`idaluno`=`compra`.`aluno_idaluno`
					WHERE `id` = $id;";			
		}
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
		
		while($dados = mysql_fetch_array($result)){
			$cliente = new Compra();
			$cliente->setid(array('id' => $dados['id']));
			$cliente->setdata(array('data' => $dados['data']));
			$cliente->setmodo_pag(array('modo_pag' => $dados['modo_pag']));
			$cliente->setvalor(array('valor' => $dados['valor']));
			$cliente->setstatus(array('status' => $dados['status']));
			$cliente->setnotification_id(array('notification_id' => $dados['notification_id']));			
			//$cliente->setaluno_idaluno(array('aluno_idaluno' => $dados['aluno_idaluno']));
			$cliente->setcliente_idcliente(array('cliente_idcliente' => $dados['cliente_idcliente']));
			$cliente->setnome(array('nome' => $dados['nome']));						
			$cliente->setemail(array('email' => $dados['email']));									
			$arr[] = $cliente;
		}
		return $arr;
	}	
	
	public function CompraCurso($id){

		$arr = array();	

		$vai = new MySQLDB();		
		
		$sql = "SELECT `venda`.`nome`, `venda`.`valor`
				FROM `compra_curso` INNER JOIN `venda` ON `venda`.`id`=`compra_curso`.`venda_id`
				WHERE `compra_curso`.`compra_id` = $id;";			
		
		$result = $vai->executeQuery($sql);
		
		while($dados = mysql_fetch_array($result)){
			$cliente = new Compra();
			$cliente->setnome(array('nome' => $dados['nome']));						
			$cliente->setvalor(array('valor' => $dados['valor']));
			$arr[] = $cliente;
		}
		return $arr;
	}		
	
}

?>