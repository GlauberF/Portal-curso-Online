<?php

class Cliente{

	public $idcliente;
	public $nome;
	public $cnpj;
	public $email;
	public $senha;
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

	protected function setsenha($senha){
		$this->senha = $senha;
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
		$cliente->setsenha(array('senha' => $dados['senha']));
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
	
	public function all_ativo($ativo){
		if($ativo == 'at'){
			$sql = "SELECT * FROM `cliente` WHERE ativo=1;";
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}if($ativo == 'de'){
			$sql = "SELECT * FROM `cliente` WHERE ativo=0;";
			$vai = new MySQLDB();
			$result = $vai->executeQuery($sql);
		}
		while($dados = mysql_fetch_array($result)){
			$cliente = new Cliente();
			$cliente->setidcliente(array('idclciente' => $dados['idcliente']));
			$arr[] = $cliente;
		}
		return $arr;
	}	

	public function Cad($nome, $cnpj, $senha, $bairro, $complemento, $cidade, $estado, $cep, $endereco, $email, $telefone, $site, $online, $simulado, $logo){
		if(!$simulado){
			$simulado = 0;
		}
		if(!$online){
			$online = 0;
		}		
		if (empty($logo['name'])){
			$logo_bd = "../../img/sem_imagem.gif";		
			$sql = "INSERT INTO `cliente` (`nome`, `cnpj`, `senha`, `bairro`, `complemento`, `cidade`, `estado`, `cep`, `endereco`, `email`, `telefone`, `site`, `online`, `simulado`, `logo`) VALUES ('$nome', '$cnpj', '$senha', '$bairro', '$complemento', $cidade, $estado, '$cep', '$endereco', '$email', '$telefone', '$site', $online, $simulado, '$logo_bd');"; 
			$vai = new MySQLDB();
			$vai->executeQuery($sql);
			header ("Location: cliente.php?vi=cad");
		}else{
			if (strpos($logo['type'], "image") === false) {
				$erro .= "Este arquivo não &eacute; uma imagem. Arquivo:".$logo['name']."<br />";
			}else{
				$nome_original = $logo['name'];
				list($nome_arquivo, $extensao_arquivo) = explode(".", $nome_original);

				$ds90 = str_replace(" ", "_", $nome_arquivo);
				$numero_reg = rand(1,999);
				$nome_aleatorio_arquivo = $ds90 . $numero_reg;
				$logo_bd = "../../img/" . $nome_aleatorio_arquivo . "." . $extensao_arquivo;

				if (!move_uploaded_file($logo['tmp_name'], "./$logo_bd")) {
					$erro .= "Erro no envio da imagem.<br />";
					header ("Location: cliente.php?vi=erro_cliente&error=$erro");
				}else{

					include("../../plugins/SimpleImage/SimpleImage.php");

		            $image = new SimpleImage();
		            $image->load($logo_bd);
		            $image->resizeToWidth(250);
		            $image->save($logo_bd);
		            
				$sql = "INSERT INTO `cliente` (`nome`, `cnpj`, `senha`, `bairro`, `complemento`, `cidade`, `estado`, `cep`, `endereco`, `email`, `telefone`, `site`, `online`, `simulado`, `logo`) VALUES ('$nome', '$cnpj', '$senha', '$bairro', '$complemento', $cidade, $estado, '$cep', '$endereco', '$email', '$telefone', '$site', $online, $simulado, '$logo_bd');"; 
					$vai = new MySQLDB();
					$vai->executeQuery($sql);
					header ("Location: cliente.php?vi=cad");		            
				}
			}
		}			
	}

	public function Edit($idcliente, $nome, $cnpj, $bairro, $complemento, $cidade, $estado, $cep, $endereco, $email, $telefone, $site){
	
		$sql = "UPDATE `cliente` SET `nome`='$nome', `cnpj`='$cnpj', `bairro`='$bairro', `complemento`='$complemento', `cidade`=$cidade, `estado`=$estado, `cep`='$cep', `endereco`='$endereco', `email`='$email', `telefone`='$telefone', `site`='$site' WHERE `idcliente`=$idcliente;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: online_cliente.php?vi=config&ed=$idcliente");
	}	
	
/*

	public function ATIVA($id, $a){
		$vai = new MySQLDB();
		$sql = "SELECT `folder_estabelecimento` FROM `estabelecimento` WHERE `id_estabelecimento`=$id;";
		$result = $vai->ExecuteQuery($sql);

		while ($rows = mysql_fetch_object($result)) {
			$folder_estabelecimento = $rows->folder_estabelecimento;
		}
		if($folder_estabelecimento == ""){
			header ("Location: vi_estabelecimento.php?vi=erro_ativa_estabelecimento&ed=$id");
		}else{
			$sql = "UPDATE `cliente` SET `ativo`=$a WHERE `idcliente`=$id;";
			$vai->executeQuery($sql);
			header ("Location: vi_cliente.php?vi=ativa&ed=$id");
		}
	}
*/
	public function Password($idcliente, $senha){
		$sql = "UPDATE `cliente` SET `senha`='$senha' WHERE `idcliente`=$idcliente;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: vi_cliente.php?vi=senha&ed=$idcliente");
	}

	public function config($folder, $idcliente, $ativo, $online, $simulado){
		if (!is_dir("../../www/$folder")) {
			mkdir("../../www/$folder", 0777);
			mkdir("../../aulas/$folder", 0777);
			mkdir("../../material/$folder", 0777);
		}		
		$sql = "UPDATE `cliente` SET `folder`='$folder', `ativo`=$ativo, `online`=$online, `simulado`=$simulado WHERE `idcliente`=$idcliente;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: online_cliente.php?vi=config&ed=$idcliente");
	}
	
	public function logo($idcliente, $logo){

		$vai = new MySQLDB();
		$sql = "SELECT `logo` FROM `cliente` WHERE `idcliente` = $idcliente;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		if ($objeto->logo != "../../img/sem_imagem.gif"){
			@unlink("$objeto->logo");
		}		
		
		
		if (strpos($logo['type'], "image") === false) {
			$erro .= "Este arquivo não &eacute; uma imagem. Arquivo:".$logo['name']."<br />";
		}else{
			$nome_original = $logo['name'];
			list($nome_arquivo, $extensao_arquivo) = explode(".", $nome_original);

			$ds90 = str_replace(" ", "_", $nome_arquivo);
			$numero_reg = rand(1,999);
			$nome_aleatorio_arquivo = $ds90 . $numero_reg;
			$logo_bd = "../../img/" . $nome_aleatorio_arquivo . "." . $extensao_arquivo;

			if (!move_uploaded_file($logo['tmp_name'], "./$logo_bd")) {
				$erro .= "Erro no envio da imagem.<br />";
				header ("Location: vi_cliente.php?vi=erro_logo&error=$erro&ed=$idcliente");
			}else{

				include("../../plugins/SimpleImage/SimpleImage.php");

		        $image = new SimpleImage();
		        $image->load($logo_bd);
		        $image->resizeToWidth(250);
		        $image->save($logo_bd);
		            
				$sql = "UPDATE `cliente` SET `logo`='$logo_bd' WHERE `idcliente`=$idcliente;";
				$vai->executeQuery($sql);
				header ("Location: online_cliente.php?vi=edit&ed=$idcliente");		            
			}
		}			
	}
}
?>
