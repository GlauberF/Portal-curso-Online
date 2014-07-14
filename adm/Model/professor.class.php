<?php

class Professor{

	public $idprofessor;
	public $nome;
	public $email;
	public $tel;
	public $cel;	
	public $cpf;
	public $cliente_idcliente;	
	public $comissao;		

	protected function setidprofessor($idprofessor){
		$this->idprofessor = $idprofessor;
	}

	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setemail($email){
		$this->email = $email;
	}

	protected function settel($tel){
		$this->tel = $tel;
	}	

	protected function setcel($cel){
		$this->cel = $cel;
	}		
	
	protected function setcpf($cpf){
		$this->cpf = $cpf;
	}
	
	protected function setcliente_idcliente($cliente_idcliente){
		$this->cliente_idcliente = $cliente_idcliente;
	}

	protected function setcomissao($comissao){
		$this->comissao = $comissao;
	}	

	public function all($id, $cliente){

		$arr = array();	
			
		if($id == ''){
			$sql = "SELECT * FROM `professor` WHERE cliente_idcliente=$cliente;";
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}else{
			$sql = "SELECT `idprofessor`, `nome`, `email`, `tel`, `cel`, `cpf`, `cliente_idcliente`, `comissao` FROM `professor` WHERE `idprofessor` = $id;";
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}
		while($dados = mysql_fetch_array($result)){
			$cliente = new Professor();
			$cliente->setidprofessor(array('idprofessor' => $dados['idprofessor']));
			$cliente->setnome(array('nome' => $dados['nome']));
			$cliente->setemail(array('email' => $dados['email']));
			$cliente->settel(array('tel' => $dados['tel']));
			$cliente->setcel(array('cel' => $dados['cel']));		
			$cliente->setcpf(array('cpf' => $dados['cpf']));
			$cliente->setcliente_idcliente(array('cliente_idcliente' => $dados['cliente_idcliente']));		
			$cliente->setcomissao(array('comissao' => $dados['comissao']));
			$arr[] = $cliente;
		}
		return $arr;
	}	

	public function Cad($nome, $email, $tel, $cel, $cpf, $cliente_idcliente, $comissao){
		$sql = "INSERT INTO `professor` (`nome`, `email`, `tel`, `cel`, `cpf`, `cliente_idcliente`, `comissao`) VALUES ('$nome', '$email', '$tel', '$cel', '$cpf', $cliente_idcliente, $comissao);";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: parceiro.php?vi=cad&ed=$cliente_idcliente");
	}	
	
	public function Edit($idprofessor, $nome, $email, $tel, $cel, $cpf, $comissao, $cliente){
		$sql = "UPDATE `professor` SET `nome`='$nome', `email`='$email', `tel`='$tel', `cel`='$cel', `cpf`='$cpf', `comissao`=$comissao WHERE `idprofessor`=$idprofessor;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: parceiro.php?vi=edit&nu=$idprofessor&ed=$cliente");
	}	

	public function Del($id, $cliente){
		$sql = "DELETE FROM `professor` WHERE `idprofessor` = $id;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: parceiro.php?vi=del&ed=$cliente");
	}		
	
}

?>