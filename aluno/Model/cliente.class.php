<?php

class Cliente{

	public $idcliente;
	public $nome;
	public $cnpj;
	public $email;
	public $site;
	public $endereco;
	public $complemento;
	public $bairro;
	public $cep;
	public $cidade;
	public $estado;
	public $telefone;	
	public $ativo;		
	public $folder;			
	public $simulado;			
	public $online;			
	public $logo;				
	
	protected function setidcliente($idcliente){
		$this->idcliente = $idcliente;
	}

	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setcnpj($cnpj){
		$this->cnpj = $cnpj;
	}

	protected function setemail($email){
		$this->email = $email;
	}

	protected function setsite($site){
		$this->site = $site;
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
	
	protected function setativo($ativo){
		$this->ativo = $ativo;
	}	
	
	protected function setfolder($folder){
		$this->folder = $folder;
	}		
	
	protected function settelefone($telefone){
		$this->telefone = $telefone;
	}		

	protected function setsimulado($simulado){
		$this->simulado = $simulado;
	}

	protected function setonline($online){
		$this->online = $online;
	}	
	
	protected function setlogo($logo){
		$this->logo = $logo;
	}		

	public function all($id){

		if($id == ''){
			$sql = "SELECT * FROM `cliente`;";
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}else{
			$sql = "SELECT `idcliente`, `nome`, `cnpj`, `email`, `senha`, `site`, `endereco`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `ativo`, `telefone`, `folder`, `simulado`, `online`, `logo` FROM `cliente` WHERE `idcliente` = $id;";
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}
		while($dados = mysql_fetch_array($result)){
			$cliente = new Cliente();
			$cliente->setidcliente(array('idcliente' => $dados['idcliente']));
			$cliente->setnome(array('nome' => $dados['nome']));
			$cliente->setcnpj(array('cnpj' => $dados['cnpj']));
			$cliente->setemail(array('email' => $dados['email']));
			$cliente->setsite(array('site' => $dados['site']));
			$cliente->setendereco(array('endereco' => $dados['endereco']));
			$cliente->setcomplemento(array('complemento' => $dados['complemento']));
			$cliente->setbairro(array('bairro' => $dados['bairro']));
			$cliente->setcep(array('cep' => $dados['cep']));
			$cliente->setcidade(array('cidade' => $dados['cidade']));
			$cliente->setestado(array('estado' => $dados['estado']));
			$cliente->setativo(array('ativo' => $dados['ativo']));
			$cliente->setfolder(array('folder' => $dados['folder']));			
			$cliente->settelefone(array('telefone' => $dados['telefone']));			
			$cliente->setonline(array('online' => $dados['online']));			
			$cliente->setsimulado(array('simulado' => $dados['simulado']));			
			$cliente->setlogo(array('logo' => $dados['logo']));									
			$arr[] = $cliente;
		}
		return $arr;	
	}
}
?>