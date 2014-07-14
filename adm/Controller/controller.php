<?php
require('../Model/connectDB.php');
require('../Model/user.class.php');
require('../Model/log.class.php');
require('../Model/versao.class.php');
require('../Model/media.class.php');
require('../Model/cliente.class.php');
require('../Model/estados.class.php');
require('../Model/cidades.class.php');
require('../Model/configuracao.class.php');
//require('../Model/contato.class.php');
require('../Model/aluno.class.php');
require('../Model/aula.class.php');
require('../Model/material.class.php');
require('../Model/concurso.class.php');
require('../Model/curso.class.php');
require('../Model/professor.class.php');
require('../Model/gateway.class.php');
require('../Model/venda.class.php');
require('../Model/tema.class.php');
require('../Model/layout.class.php');
require('../Model/compra.class.php');

class Control {

    /*	----------------------- login -------------------------------------*/
	public function entraLogin($email, $password){
		$this->control = new login();
		$this->control->verificaLogin($email, $password);
	}

	public function helpLogin($email){
		$this->control = new login();
		$this->control->verificaemail($email);
	}

	public function change($id, $password){
		include("../../plugins/Password/PASSWORD.php");
		$senha = PASSWORD::hash($password);
		$this->control = new login();
		$this->control->changePass($id, $senha);
	}

	public function VerifyHelp($id, $a){
	   $this->control = new login();
	   return $this->control->VERIFY($id, $a);
	}
    /*	----------------------- login -------------------------------------*/

    
    
    

	/*	----------------------- estados -------------------------------------*/

	public function Controle_estados($id){
		$this->control = new Estados();
		return $this->control->all($id);
	}

	/*	----------------------- estados -------------------------------------*/


	/*	----------------------- cidades -------------------------------------*/

	public function Controle_cidades($id){
		$this->control = new Cidades();
		return $this->control->all($id);
	}

	/*	----------------------- cidades -------------------------------------*/






	/* -------------------- log -----------------*/
		public function Controle_log($id){
			$this->control = new Log();
			return $this->control->all($id);
		}

		public function Enter_log($text){
			$this->control = new Log();
			$this->control->create_log($text);
		}


	/* -------------------- log -----------------*/


	
	
	
	
	/* -------------------- contato -----------------

	public function Controle_contato($id, $type, $id_usuario_admin){
		$this->control = new Contato();
		return $this->control->all($id, $type, $id_usuario_admin);
	}

	public function delcontact($nu){
		$this->control = new Contato();
		$this->control->deletecontact($nu);
	}

	public function readcontact($id){
		$this->control = new Contato();
		$this->control->read($id);
	}

	public function cadSend($assunto, $id_estabelecimento_id, $id_usuario_admin_id, $texto){
		$this->control = new Contato();
		$this->control->intoContato($assunto, $id_estabelecimento_id, $id_usuario_admin_id, $texto);
	}

 -------------------- contato -----------------*/


	
	
	
	/* -------------------- configuracao -----------------*/
	public function Controle_configuracao($id){
		$this->control = new Configuracao();
		return $this->control->all($id);
	}

	public function editConfiguracao($id, $email, $emailnews, $smtp, $bdbackup, $filebackup, $smtppass, $cliente_idcliente){
		$this->control = new Configuracao();
		$this->control->Edit($id, $email, $emailnews, $smtp, $bdbackup, $filebackup, $smtppass, $cliente_idcliente);
	}

	public function cadConfiguracao($cliente){
		$this->control = new Configuracao();
		$this->control->Cad($cliente);
	}	
	/* -------------------- configuracao -----------------*/


	



	/*	----------------------- controle versao -------------------------------------*/
	public function Estatic_version(){
		$this->control = new Versao();
		return $this->control->estatic();
	}

	public function Dynamic_version($id){
		$this->control = new Versao();
		return $this->control->all($id);
	}

	public function cVersao($atualizacao_numero, $nome, $descricao){
		$this->control = new Versao();
		$this->control->Cad($atualizacao_numero, $nome, $descricao);
	}

	public function dVersao($nu){
		$this->control = new Versao();
		$this->control->deleteVersao($nu);
	}

	public function eVersao($id, $atualizacao_numero, $nome, $descricao){
		$this->control = new Versao();
		$this->control->editeVersao($id, $atualizacao_numero, $nome, $descricao);
	}
	/*	----------------------- controle versao -------------------------------------*/



	/* -------------------- contador de mensagens -----------------

    public function Contador($id){
		$this->control = new Contato();
		return $this->control->Count($id);
	}

	 -------------------- contador de mensagens -----------------*/



/*	----------------------- cliente -------------------------------------*/


    public function Controle_cliente($id){
		$this->control = new Cliente();
		return $this->control->all($id);
	}
	
    public function Controle_clienteAtivo($ativo){
		$this->control = new Cliente();
		return $this->control->all_ativo($ativo);
	}	

	public function cadCliente($nome, $cnpj, $senha, $bairro, $complemento, $cidade, $estado, $cep, $endereco, $email, $telefone, $site, $online, $simulado, $logo){
		include("../../plugins/Password/PASSWORD.php");
		$this->control = new Cliente();
		$this->control->Cad($nome, $cnpj, PASSWORD::hash($senha), $bairro, $complemento, $cidade, $estado, $cep, $endereco, $email, $telefone, $site, $online, $simulado, $logo);
	}

	public function delCliente($nu){
		$this->control = new Cliente();
		$this->control->Del($nu);
	}

	public function editCliente($idcliente, $nome, $cnpj, $bairro, $complemento, $cidade, $estado, $cep, $endereco, $email, $telefone, $site){
		$this->control = new Cliente();
		$this->control->Edit($idcliente, $nome, $cnpj, $bairro, $complemento, $cidade, $estado, $cep, $endereco, $email, $telefone, $site);
	}

	public function passCliente($idcliente, $senha){
		include("../../plugins/Password/PASSWORD.php");
		$this->control = new Cliente();
		$this->control->Password($idcliente, PASSWORD::hash($senha));
	}

	public function configCliente($folder, $idcliente, $ativo, $online, $simulado){
		$this->control = new Cliente();
		$this->control->config($folder, $idcliente, $ativo, $online, $simulado);
	}
	
	public function logoCliente($idcliente, $logo){
		$this->control = new Cliente();
		$this->control->logo($idcliente, $logo);
	}
	/*	----------------------- cliente -------------------------------------*/

	


   /*	-----------------------controle usuarios administrativos -------------------------------------*/


	public function Controle_user($id){
		$this->control = new User();
		return $this->control->all($id);
	}

	public function cadUser($nome, $senha, $email, $status){
		include("../../plugins/Password/PASSWORD.php");
		$this->control = new User();
		$this->control->Cad($nome, PASSWORD::hash($senha), $email, $status);
	}

	public function editUser($id, $nome, $email, $status){
		$this->control = new User();
		$this->control->Edit($id, $nome, $email, $status);
	}

	public function delUser($nu){
		$this->control = new User();
		$this->control->Del($nu);
	}

	public function passUser($id, $senha){
		include("../../plugins/Password/PASSWORD.php");
		$this->control = new User();
		$this->control->EditPass($id, PASSWORD::hash($senha));
	}

    /*	-----------------------controle usuarios administrativos -------------------------------------*/

    
    
	/*	----------------------- aluno -------------------------------------*/


    public function Controle_aluno($id, $cliente){
		$this->control = new Aluno();
		return $this->control->all($id, $cliente);
	}

	public function editAluno($idaluno, $nome, $cpf, $email, $tel, $cel, $endereco, $complemento, $bairro, $cep, $cidade, $estado, $cliente_idcliente){
		$this->control = new Aluno();
		$this->control->Edit($idaluno, $nome, $cpf, $email, $tel, $cel, $endereco, $complemento, $bairro, $cep, $cidade, $estado, $cliente_idcliente);
	}

	public function cadAluno($nome, $cpf, $email, $senha, $tel, $cel, $endereco, $complemento, $bairro, $cep, $cidade, $estado, $cliente_idcliente){
		include("../../plugins/Password/PASSWORD.php");
		$this->control = new Aluno();
		$this->control->Cad($nome, $cpf, $email, PASSWORD::hash($senha), $tel, $cel, $endereco, $complemento, $bairro, $cep, $cidade, $estado, $cliente_idcliente);
	}	
	
	public function senha($id, $password, $cliente){
		include("../../plugins/Password/PASSWORD.php");
		$this->control = new Aluno();
		$this->control->PASSAluno($id, PASSWORD::hash($password), $cliente);
	}	
	
	public function delAluno($id, $cliente){
		$this->control = new Aluno();
		$this->control->Del($id, $cliente);
	}		


	/*	----------------------- aluno -------------------------------------*/	    
	
	
	
	/*	----------------------- curso -------------------------------------*/

    public function Controle_curso($id, $cliente){
		$this->control = new Curso();
		return $this->control->all($id, $cliente);
	}

	public function editCurso($idcurso, $nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente, $date_in, $date_out, $adicional){
		$this->control = new Curso();
		$this->control->Edit($idcurso, $nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente, $date_in, $date_out, $adicional);
	}

	public function cadCurso($nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente, $date_in, $date_out, $capa, $adicional){
		$this->control = new Curso();
		$this->control->Cad($nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente, $date_in, $date_out, $capa, $adicional);
	}	
	
	public function delCurso($id, $cliente){
		$this->control = new Curso();
		$this->control->Del($id, $cliente);
	}		
	
	public function editCapaCurso($id, $capa, $cliente){
		$this->control = new Curso();
		$this->control->CapaCurso($id, $capa, $cliente);		
	}	

	/*	----------------------- curso -------------------------------------*/		
	
	
	
	/*	----------------------- concurso -------------------------------------*/

    public function Controle_concurso($id, $cliente){
		$this->control = new Concurso();
		return $this->control->all($id, $cliente);
	}

	public function editConcurso($idconcurso, $nome, $descricao, $remuneracao, $vagas, $cliente_idcliente){
		$this->control = new Concurso();
		$this->control->Edit($idconcurso, $nome, $descricao, $remuneracao, $vagas, $cliente_idcliente);
	}

	public function cadConcurso($nome, $descricao, $remuneracao, $vagas, $cliente_idcliente){
		$this->control = new Concurso();
		$this->control->Cad($nome, $descricao, $remuneracao, $vagas, $cliente_idcliente);
	}	
	
	public function delConcurso($id, $cliente){
		$this->control = new Concurso();
		$this->control->Del($id, $cliente);
	}	

	/*	----------------------- concurso -------------------------------------*/		
	
	
	/*	----------------------- professor -------------------------------------*/
	
	    public function Controle_professor($id, $cliente){
			$this->control = new Professor();
			return $this->control->all($id, $cliente);
		}
	
		public function editProfessor($idprofessor, $nome, $email, $tel, $cel, $cpf, $comissao, $cliente){
			$this->control = new Professor();
			$this->control->Edit($idprofessor, $nome, $email, $tel, $cel, $cpf, $comissao, $cliente);
		}
	
		public function cadProfessor($nome, $email, $tel, $cel, $cpf, $cliente_idcliente, $comissao){
			$this->control = new Professor();
			$this->control->Cad($nome, $email, $tel, $cel, $cpf, $cliente_idcliente, $comissao);
		}	
		
		public function delProfessor($id, $cliente){
			$this->control = new Professor();
			$this->control->Del($id, $cliente);
		}		
	
	/*	----------------------- professor -------------------------------------*/		
	
	
	
	/*	----------------------- gateway -------------------------------------*/

    public function Controle_gateway($id, $cliente){
		$this->control = new Gateway();
		return $this->control->all($id, $cliente);
	}

	public function cadGateway($nome, $email, $token, $ativo, $cliente_idcliente){
		$this->control = new Gateway();
		$this->control->Cad($nome, $email, $token, $ativo, $cliente_idcliente);
	}	

	public function editGateway($id, $nome, $email, $token, $ativo, $cliente_idcliente){
		$this->control = new Gateway();
		$this->control->Edit($id, $nome, $email, $token, $ativo, $cliente_idcliente);
	}	
	
	public function delGateway($id, $cliente_idcliente){
		$this->control = new Gateway();
		$this->control->Del($id, $cliente_idcliente);
	}	

	/*	----------------------- gateway -------------------------------------*/		
    
	
	/*	----------------------- aula -------------------------------------*/

    public function Controle_aula($id, $cliente){
		$this->control = new Aula();
		return $this->control->all($id, $cliente);
	}

	public function editAula($idaula, $nome, $endereco_video, $descricao, $curso_idcurso, $cliente_idcliente){
		$this->control = new Aula();
		$this->control->Edit($idaula, $nome, $endereco_video, $descricao, $curso_idcurso, $cliente_idcliente);
	}

	public function cadAula($nome, $endereco_video, $descricao, $curso_idcurso, $cliente_idcliente){
		$this->control = new Aula();
		$this->control->Cad($nome, $endereco_video, $descricao, $curso_idcurso, $cliente_idcliente);
	}	
	
	public function delAula($id, $cliente){
		$this->control = new Aula();
		$this->control->Del($id, $cliente);
	}		

	/*	----------------------- aula -------------------------------------*/	
	
	
	/*	----------------------- material -------------------------------------*/

    public function Controle_material($id, $cliente){
		$this->control = new Material();
		return $this->control->all($id, $cliente);
	}

	public function editMaterial($idmaterial, $nome, $descricao, $aula_idaula, $cliente_idcliente){
		$this->control = new Material();
		$this->control->Edit($idmaterial, $nome, $descricao, $aula_idaula, $cliente_idcliente);
	}

	public function cadMaterial($nome, $endereco, $descricao, $aula_idaula, $cliente_idcliente, $folder){
		$this->control = new Material();
		$this->control->Cad($nome, $endereco, $descricao, $aula_idaula, $cliente_idcliente, $folder);
	}	
	
	public function delMaterial($id, $cliente){
		$this->control = new Material();
		$this->control->Del($id, $cliente);
	}		
	
	public function Arquivo($idmaterial, $endereco, $cliente, $folder){
		$this->control = new Material();
		$this->control->ChangeArq($idmaterial, $endereco, $cliente, $folder);
	}		

	/*	----------------------- material -------------------------------------*/		
	
	
	
	/*	----------------------- venda -------------------------------------*/

    public function Controle_venda($id, $cliente){
		$this->control = new Venda();
		return $this->control->all($id, $cliente);
	}

    public function Venda_many($id){
		$this->control = new Venda();
		return $this->control->allMany($id);
	}	
	
	public function editVenda($id, $nome, $idcurso, $valor, $cliente_idcliente, $date_in, $date_out, $descricao, $adicional){
		$this->control = new Venda();
		$this->control->Edit($id, $nome, $idcurso, $valor, $cliente_idcliente, $date_in, $date_out, $descricao, $adicional);
	}

	public function cadVenda($nome, $idcurso, $valor, $capa, $cliente_idcliente, $date_in, $date_out, $descricao, $adicional){
		$this->control = new Venda();
		$this->control->Cad($nome, $idcurso, $valor, $capa, $cliente_idcliente, $date_in, $date_out, $descricao, $adicional);
	}	
	
	public function delVenda($id, $cliente){
		$this->control = new Venda();
		$this->control->Del($id, $cliente);
	}		
	
	public function editCapa($id, $capa, $cliente){
		$this->control = new Venda();
		$this->control->Capa($id, $capa, $cliente);		
	}

	/*	----------------------- venda -------------------------------------*/		
	
	
	/*	----------------------- tema -------------------------------------*/

    public function Controle_tema($id){
		$this->control = new Tema();
		return $this->control->all($id);
	}

	public function editTema($id, $nome){
		$this->control = new Tema();
		$this->control->Edit($id, $nome);
	}

	public function cadTema($nome, $capa, $zip){
		$this->control = new Tema();
		$this->control->Cad($nome, $capa, $zip);
	}	
	
	public function delTema($id){
		$this->control = new Tema();
		$this->control->Del($id);
	}		
	
	public function editCapaTema($id, $capa){
		$this->control = new Tema();
		$this->control->CapaTema($id, $capa);		
	}	

	public function editZipTema($id, $zip){
		$this->control = new Tema();
		$this->control->ZipTema($id, $zip);		
	}		
	
	/*	----------------------- tema -------------------------------------*/			

	
	
	/*	----------------------- layout -------------------------------------*/				
	
    public function Controle_layout($id){
		$this->control = new Layout();
		return $this->control->all($id);
	}	
	
	public function UseLayout($cliente, $id){
		$this->control = new Layout();
		$this->control->Cad($cliente, $id);
	}		
	
	public function Cache($cliente){
		$this->control = new Layout();
		$this->control->ResetCache($cliente);
	}	
	
	/*	----------------------- layout -------------------------------------*/			

	
	/*	----------------------- compra -------------------------------------*/				
	
    public function Controle_compra($id, $cliente){
		$this->control = new Compra();
		return $this->control->all($id, $cliente);
	}	
	
    public function Controle_compracurso($id){
		$this->control = new Compra();
		return $this->control->CompraCurso($id);    	
    }
		
	/*	----------------------- compra -------------------------------------*/		
}

?>
