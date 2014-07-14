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
	
	protected function settelefone($telefone){
		$this->telefone = $telefone;
	}		


	public function all($id){

	if($id == ''){
		$sql = "SELECT * FROM `cliente`;";
		$vai = new MySQLDB();
		$result = $vai->executeQuery($sql);
	}else{
		$sql = "SELECT `idcliente`, `nome`, `cnpj`, `email`, `senha`, `site`, `endereco`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `ativo`, `telefone` FROM `cliente` WHERE `idcliente` = $id;";
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
		$cliente->settelefone(array('telefone' => $dados['telefone']));			
		$arr[] = $cliente;
	}
	return $arr;
	}	

	public function PASSEstabelecimento($id_estabelecimento, $pass_estabelecimento){
		$sql = "UPDATE `estabelecimento` SET `pass_estabelecimento`='$pass_estabelecimento' WHERE `id_estabelecimento`=$id_estabelecimento;";
		$vai = new MySQLDB();
		$vai->executeQuery($sql);
		header ("Location: vi_estabelecimento.php?vi=senha_estabelecimento&ed=$id_estabelecimento");
	}

}

class login extends Cliente {

	public function verificaLogin($email, $password){

		$vai = new MySQLDB();
		$email = stripslashes($email);
		$password = stripslashes($password);
		$email = mysql_real_escape_string($email);
		$password = mysql_real_escape_string($password);


		$sql = "SELECT `senha` FROM `cliente` WHERE `email`='$email' AND `ativo`=1;";
		$result = $vai->ExecuteQuery($sql);

		while ($rows = mysql_fetch_object($result)) {
			$pass = $rows->senha;
		}
		if ($pass == "") {
			header ("Location: login.php?vi=erro_login");
		}else{

			include("../../plugins/Password/PASSWORD.php");
			$senha = PASSWORD::check_password($pass, $password);

			if($senha){
				$sql = "SELECT * FROM `cliente` WHERE `email`='$email';";
				$result = $vai->ExecuteQuery($sql);

				while ($rows = mysql_fetch_object($result)) {
					$idcliente = $rows->idcliente;
					$email = $rows->email;
					$nome = $rows->nome;
					$folder = $rows->folder;					
				}
				session_start();
				$_SESSION['IdCliente'] = $idcliente;
				$_SESSION['EmailCliente'] = "$email";
				$_SESSION['NomeCliente'] = "$nome";
				$_SESSION['FolderCliente'] = "$folder";
				$ip = $_SERVER["REMOTE_ADDR"];
				$result = $vai->ExecuteQuery($sql2);
				header ("Location: index.php");
			}else{
				header ("Location: login.php?vi=erro_login");
			}

		}
	}

	public function verificaemail($email){


		$vai = new MySQLDB();
		$sql = "SELECT `id_usuario_admin`, `email_usuario_admin`, `nome_completo_usuario_admin` FROM `usuario_admin` WHERE `email_usuario_admin`='$email';";
		$result = $vai->ExecuteQuery($sql);
		while ($rows = mysql_fetch_object($result)) {
			$id_usuario_admin = $rows->id_usuario_admin;
			$email_usuario_admin = $rows->email_usuario_admin;
			$nome_completo_usuario_admin = $rows->nome_completo_usuario_admin;
		}

		if ($email_usuario_admin != "") {
			$sql = "SELECT `email_send`, `endereco_smtp`, `senha_smtp` FROM `configuracao` WHERE `id_configuracao`=1;";
			$result = $vai->ExecuteQuery($sql);
			while ($rows = mysql_fetch_object($result)) {
				$email_send = $rows->email_send;
				$endereco_smtp = $rows->endereco_smtp;
				$senha_smtp = $rows->senha_smtp;
			}

			$token = uniqid(md5(rand()), true);

			if(PATH_SEPARATOR == ";") $quebra_linha = "\r\n";
			else $quebra_linha = "\n";
			$corpo = "<b>Esqueceu a sua senha?</b><br /><br />";
			$corpo .= "Você teve problemas em acessar o painel do Vai da Certo.<br /><br />";
			$corpo .= "<b>Alterar a senha:</b><br />Para alterar a sua senha acesse o link abaixo:<br /><br />";
			$corpo .= "<a href=http://localhost/recovery.php?id=$id_usuario_admin&a=$token>http://localhost/recovery.php?id=$id_usuario_admin&a=$token</a><br />";

			require("../../plugins/PHPMailer/class.phpmailer.php");

			$mail = new PHPMailer();

			$mail->IsSMTP();
			$mail->Host = $endereco_smtp;
			$mail->Port = 25;
         $mail->SMTPAuth = false;
         $mail->Username = $email_send;
         $mail->Password = $senha_smtp;

			$mail->From = $email_send; // Seu e-mail
         $mail->Sender = $email_send; // Seu e-mail
			$mail->FromName = "Nao responda - Recuperar senha"; // Seu nome

			$mail->AddAddress($email_usuario_admin, $nome_completo_usuario_admin);

			$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
			$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

			$mail->Subject  = "Recuperação de senha Vai da certo"; // Assunto da mensagem
			$mail->Body = $corpo;
         $mail->AltBody = $corpo;

			$enviado = $mail->Send();

			$mail->ClearAllRecipients();
			$mail->ClearAttachments();
         $today = date("Y-m-d");
         if ($enviado){
      		$sql = "INSERT INTO `recovery` (`token`, `id_user`, `data_in`, `type_user`) VALUES ('$token', $id_usuario_admin, '$today', 'panel');";
      		$vai = new MySQLDB();
      		$vai->ExecuteQuery($sql);
				$ip = $_SERVER["REMOTE_ADDR"];
            $today_log = date("m/d/y");
				$sql2 = "INSERT INTO log (`descricao_log`, `data`, `tipo_log`) VALUES ('Esqueceu senha painel - $nome_completo_usuario_admin - IP: $ip', '$today_log', 'esqueceu senha');";
				$result = $vai->ExecuteQuery($sql2);
            header ("Location: help.php?vi=email_sent");
         }else{
            header ("Location: help.php?vi=email_notsent");
         }

		}else{
			header ("Location: help.php?vi=email_erro");
		}
	}

	public function changePass($id, $senha){
		$sql = "UPDATE `usuario_admin` SET `senha_usuario_admin`='$senha' WHERE `id_usuario_admin`=$id;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		$sql = "DELETE FROM `recovery` WHERE `id_user` = $id AND `type_user`='panel';";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: login.php?vi=senhaOK");
	}

	public function VERIFY($id, $a){

		$sql = "SELECT * FROM `recovery` where `token`='$a';";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);

      if(mysql_fetch_array($result) !== false){
         return true;
      }else{
         return false;
      }
	}

}
?>