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

	public function all($id){

		$arr = array();
				
		if(empty($id)){
			$sql = "SELECT * FROM `versao`;";
			$vai = new MySQLDB();
			$result = $vai->ExecuteQuery($sql);
		}else{
			$sql = "SELECT * FROM `versao` WHERE `id` = $id;";
			$vai = new MySQLDB();
			$result = $vai->ExecuteQuery($sql);
		}
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

	public function Cad($atualizacao_numero, $nome, $descricao){

		$sql = "INSERT INTO `versao` (`atualizacao_numero`, `nome`, `descricao`) VALUES ('$atualizacao_numero', '$nome', '$descricao');";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: versao.php?vi=cad");
	}

	public function deleteVersao($id){
		$sql = "DELETE FROM `versao` WHERE `id` = $id;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: versao.php?vi=del");
	}

	public function editeVersao($id, $atualizacao_numero, $nome, $descricao){
		$sql = "UPDATE `versao` SET `atualizacao_numero` = '$atualizacao_numero', `nome` = '$nome', `descricao` = '$descricao' WHERE `id` = $id;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: versao.php?vi=edit");
	}

}

?>