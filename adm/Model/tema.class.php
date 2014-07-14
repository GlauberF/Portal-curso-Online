<?php

class Tema{

	public $id;
	public $nome;
	public $zip;
	public $capa;		

	protected function setid($id){
		$this->id = $id;
	}

	protected function setnome($nome){
		$this->nome = $nome;
	}

	protected function setzip($zip){
		$this->zip = $zip;
	}
	
	protected function setcapa($capa){
		$this->capa = $capa;
	}	
	
	public function all($id){

		$arr = array();	
			
		if($id == ''){
			$sql = "SELECT * FROM `tema`;";		
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}else{
			$sql = "SELECT * FROM `tema` WHERE `tema`.`id`=$id;";		
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}
		while($dados = mysql_fetch_array($result)){
			$cliente = new Tema();
			$cliente->setid(array('id' => $dados['id']));
			$cliente->setnome(array('nome' => $dados['nome']));
			$cliente->setzip(array('zip' => $dados['zip']));
			$cliente->setcapa(array('capa' => $dados['capa']));											
			$arr[] = $cliente;
		}
		return $arr;
	}	

	public function Cad($nome, $capa, $zip){
		
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
				header ("Location: tema.php?vi=erroe&error=$erro");
			}else{
				include("../../plugins/SimpleImage/SimpleImage.php");
		        $image = new SimpleImage();
		        $image->load($nova_capa);
				$image->cutFromCenter(270, 200);
		    	$image->save($nova_capa);				
			}
		}	

		
		list($nome_arquivo, $extensao_arquivo) = explode(".", $zip['name']);

		$nova_zip = "../../tema/" . str_replace(" ", "_", $nome_arquivo) . "." . $extensao_arquivo;
		if (!move_uploaded_file($zip['tmp_name'], "./$nova_zip")) {
			$erro = "Erro no envio do zip.<br />";
			header ("Location: tema.php?vi=erroe&error=$erro");
		}else{

			$sql = "INSERT INTO `tema` (`nome`, `zip`, `capa`) VALUES ('$nome', '$nova_zip', '$nova_capa');";
			$vai = new MySQLDB();
			$vai->executeQuery($sql);
	
			header ("Location: tema.php?vi=cad");			
			
		}				
		
	}	
	
	public function Edit($id, $nome){
		$sql = "UPDATE `tema` SET `nome`='$nome' WHERE `id`=$id;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: tema.php?vi=edit&nu=$id");
	}		
	
	public function Del($id){
		
		$vai = new MySQLDB();
		
		$sql = "SELECT `capa`, `zip` FROM `tema` WHERE `id` = $id;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		if ($objeto->capa != "../../img/sem_imagem.gif"){
			@unlink("$objeto->capa");
		}			
		@unlink("$objeto->zip");					
		
		$sql = "DELETE FROM `tema` WHERE `id` = $id;";
		$vai->ExecuteQuery($sql);
		
		header ("Location: tema.php?vi=del");
	}		
	
	public function CapaTema($id, $capa){
		
		$vai = new MySQLDB();
		
		$sql = "SELECT `capa` FROM `tema` WHERE `id` = $id;";
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
				header ("Location: tema.php?vi=erroe&error=$erro");
			}else{
				include("../../plugins/SimpleImage/SimpleImage.php");
		        $image = new SimpleImage();
		        $image->load($nova_capa);
				$image->cutFromCenter(270, 200);
		    	$image->save($nova_capa);				
			}
		}		
		
		$sql = "UPDATE `tema` SET `capa`='$nova_capa' WHERE `id`=$id;";
		$vai->executeQuery($sql);

		header ("Location: tema.php?vi=edit&nu=$id");
	
	}

	public function ZipTema($id, $zip){
		
		$vai = new MySQLDB();
		
		$sql = "SELECT `zip` FROM `tema` WHERE `id` = $id;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		@unlink("$objeto->zip");		

		$nome_original = $zip['name'];
		list($nome_arquivo, $extensao_arquivo) = explode(".", $nome_original);
		$ds90 = str_replace(" ", "_", $nome_arquivo);
		$numero_reg = rand(1,999);
		$nome_aleatorio_arquivo = $ds90 . $numero_reg;
		$nova_zip = "../../tema/" . $nome_aleatorio_arquivo . "." . $extensao_arquivo;
		if (!move_uploaded_file($zip['tmp_name'], "./$nova_zip")) {
			$erro .= "Erro no envio do zip.<br />";
			header ("Location: tema.php?vi=erroe&error=$erro");
		}else{	
		
			$sql = "UPDATE `tema` SET `zip`='$nova_zip' WHERE `id`=$id;";
			$vai->executeQuery($sql);
			header ("Location: tema.php?vi=edit&nu=$id");

		}
	}			
	
}

?>