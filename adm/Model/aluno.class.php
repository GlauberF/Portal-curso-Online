<?php

class Aluno{

	public $idaluno;
	public $nome;
	public $cpf;
	public $email;
	public $senha;
	public $tel;
	public $cel;	
	public $endereco;
	public $complemento;
	public $cep;
	public $bairro;	
	public $cidade;
	public $estado;
	public $cliente_idcliente;	

	protected function setidaluno($idaluno){
		$this->idaluno = $idaluno;
	}

	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setcpf($cpf){
		$this->cpf = $cpf;
	}

	protected function setemail($email){
		$this->email = $email;
	}

	protected function setsenha($senha){
		$this->senha = $senha;
	}

	protected function settel($tel){
		$this->tel = $tel;
	}	

	protected function setcel($cel){
		$this->cel = $cel;
	}		
	
	protected function setendereco($endereco){
		$this->endereco = $endereco;
	}

	protected function setcomplemento($complemento){
		$this->complemento = $complemento;
	}
	
	protected function setbairro($bairro){
		$this->bairro = $bairro;
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
	
	protected function setcliente_idcliente($cliente_idcliente){
		$this->cliente_idcliente = $cliente_idcliente;
	}		

	public function all($id, $cliente){

	$arr = array();	
		
	if($id == ''){
		$sql = "SELECT * FROM `aluno` WHERE cliente_idcliente=$cliente;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}else{
		$sql = "SELECT `idaluno`, `nome`, `email`, `senha`, `cpf`, `tel`, `cel`, `endereco`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `cliente_idcliente` FROM `aluno` WHERE `idaluno` = $id;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}
	
	while($dados = mysql_fetch_array($result)){
		$cliente = new Aluno();
		$cliente->setidaluno(array('idaluno' => $dados['idaluno']));
		$cliente->setnome(array('nome' => $dados['nome']));
		$cliente->setcpf(array('cpf' => $dados['cpf']));
		$cliente->setemail(array('email' => $dados['email']));
		$cliente->setsenha(array('senha' => $dados['senha']));
		$cliente->settel(array('tel' => $dados['tel']));
		$cliente->setcel(array('cel' => $dados['cel']));		
		$cliente->setendereco(array('endereco' => $dados['endereco']));
		$cliente->setcomplemento(array('complemento' => $dados['complemento']));
		$cliente->setbairro(array('bairro' => $dados['bairro']));
		$cliente->setcep(array('cep' => $dados['cep']));
		$cliente->setcidade(array('cidade' => $dados['cidade']));
		$cliente->setestado(array('estado' => $dados['estado']));
		$cliente->setcliente_idcliente(array('cliente_idcliente' => $dados['cliente_idcliente']));		
		$arr[] = $cliente;
	}
	return $arr;
	}	

	public function PASSAluno($idaluno, $senha, $cliente){
		$sql = "UPDATE `aluno` SET `senha`='$senha' WHERE `idaluno`=$idaluno;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: edit_aluno.php?vi=senha&nu=$idaluno&ed=$cliente");
	}

	public function Cad($nome, $cpf, $email, $senha, $tel, $cel, $endereco, $complemento, $bairro, $cep, $cidade, $estado, $cliente_idcliente){
		$sql = "INSERT INTO `aluno` (`nome`, `cpf`, `email`, `senha`, `tel`, `cel`, `endereco`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `cliente_idcliente`) VALUES ('$nome', '$cpf', '$email', '$senha', '$tel', '$cel', '$endereco', '$complemento', '$bairro', '$cep', $cidade, $estado, $cliente_idcliente);";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: aluno.php?vi=cad&ed=$cliente_idcliente");
	}	
	
	public function Edit($idaluno, $nome, $cpf, $email, $tel, $cel, $endereco, $complemento, $bairro, $cep, $cidade, $estado, $cliente_idcliente){
		$sql = "UPDATE `aluno` SET `nome`='$nome', `cpf`='$cpf', `email`='$email', `tel`='$tel', `cel`='$cel', `endereco`='$endereco', `complemento`='$complemento', `bairro`='$bairro', `cep`='$cep', `cidade`=$cidade, `estado`=$estado WHERE `idaluno`=$idaluno;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: edit_aluno.php?vi=edit&nu=$idaluno&ed=$cliente_idcliente");
	}	

	public function Del($id, $cliente){
		$sql = "DELETE FROM `aluno` WHERE `idaluno` = $id;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: aluno.php?vi=del&ed=$cliente");
	}		
	
}

?>