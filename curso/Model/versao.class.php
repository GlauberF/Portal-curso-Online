<?php

class Versao {

	public $id;
	public $atualizacao_numero;
	public $nome;
	public $descricao;

	protected function setid($id){
		$this->id = $id;
	}

	protected function setatualizacao_numero($atualizacao_numero){
		$this->atualizacao_numero = $atualizacao_numero;
	}

	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setdescricao($descricao){
		$this->descricao = $descricao;
	}

	public function estatic(){
		
		$arr = array();
		
		$sql = "SELECT * FROM `versao` ORDER BY `id` DESC LIMIT 1;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);

		while($dados = mysql_fetch_array($result)){
			$cliente = new Versao();
			$cliente->setid(array('id' => $dados['id']));
			$cliente->setatualizacao_numero(array('atualizacao_numero' => $dados['atualizacao_numero']));
			$cliente->setnome(array('nome' => $dados['nome']));
			$cliente->setdescricao(array('descricao' => $dados['descricao']));
			$arr[] = $cliente;
		}

		return $arr;
	}

}

?>