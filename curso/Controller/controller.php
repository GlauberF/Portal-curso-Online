<?php
require('../Model/connectDB.php');
require('../Model/versao.class.php');
require('../Model/cliente.class.php');
require('../Model/aluno.class.php');
require('../Model/aula.class.php');
require('../Model/estados.class.php');
require('../Model/cidades.class.php');
require('../Model/curso.class.php');
require('../Model/concurso.class.php');
require('../Model/professor.class.php');
require('../Model/material.class.php');
require('../Model/venda.class.php');

require('../Model/contato.class.php');

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



	
	
	
	
	/* -------------------- contato -----------------*/

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

	/* -------------------- contato -----------------*/


	/*	----------------------- controle versao -------------------------------------*/
	public function Estatic_version(){
		$this->control = new Versao();
		return $this->control->estatic();
	}

	public function Dynamic_version($id){
		$this->control = new Versao();
		return $this->control->all($id);
	}
	/*	----------------------- controle versao -------------------------------------*/



	/* -------------------- contador de mensagens -----------------*/

    public function Contador($id){
		$this->control = new Contato();
		return $this->control->Count($id);
	}

	/* -------------------- contador de mensagens -----------------*/


/*	----------------------- aluno -------------------------------------*/


    public function Controle_aluno($id){
		$this->control = new Aluno();
		return $this->control->all($id);
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
	
	public function senha($id, $password){
		include("../../plugins/Password/PASSWORD.php");
		$this->control = new Aluno();
		$this->control->PASSAluno($id, PASSWORD::hash($password));
	}	
	
	public function delAluno($id){
		$this->control = new Aluno();
		$this->control->Del($id);
	}		

/*	----------------------- aluno -------------------------------------*/	
	


/*	----------------------- curso -------------------------------------*/

    public function Controle_curso($id, $cliente){
		$this->control = new Curso();
		return $this->control->all($id, $cliente);
	}

	public function editCurso($idcurso, $nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente){
		$this->control = new Curso();
		$this->control->Edit($idcurso, $nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente);
	}

	public function cadCurso($nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente){
		$this->control = new Curso();
		$this->control->Cad($nome, $valor, $descricao, $concurso_idconcurso, $professor_idprofessor, $cliente_idcliente);
	}	
	
	public function delCurso($id, $cliente){
		$this->control = new Curso();
		$this->control->Del($id, $cliente);
	}		

/*	----------------------- curso -------------------------------------*/	



/*	----------------------- aula -------------------------------------*/

    public function Controle_aula($id){
		$this->control = new Aula();
		return $this->control->all($id);
	}

	public function editAula($idaula, $nome, $descricao, $curso_idcurso){
		$this->control = new Aula();
		$this->control->Edit($idaula, $nome, $descricao, $curso_idcurso);
	}

	public function cadAula($nome, $endereco_video, $descricao, $curso_idcurso, $cliente_idcliente){
		$this->control = new Aula();
		$this->control->Cad($nome, $endereco_video, $descricao, $curso_idcurso, $cliente_idcliente);
	}	
	
	public function delAula($id){
		$this->control = new Aula();
		$this->control->Del($id);
	}		

/*	----------------------- aula -------------------------------------*/	


/*	----------------------- material -------------------------------------*/

    public function Controle_material($id){
		$this->control = new Material();
		return $this->control->all($id);
	}

	public function editMaterial($idmaterial, $nome, $descricao, $aula_idaula){
		$this->control = new Material();
		$this->control->Edit($idmaterial, $nome, $descricao, $aula_idaula);
	}

	public function cadMaterial($nome, $endereco, $descricao, $aula_idaula){
		$this->control = new Material();
		$this->control->Cad($nome, $endereco, $descricao, $aula_idaula);
	}	
	
	public function delMaterial($id){
		$this->control = new Material();
		$this->control->Del($id);
	}		
	
	public function Arquivo($idmaterial, $endereco){
		$this->control = new Material();
		$this->control->ChangeArq($idmaterial, $endereco);
	}		

/*	----------------------- material -------------------------------------*/	


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



/*	----------------------- concurso -------------------------------------*/

    public function Controle_concurso($id){
		$this->control = new Concurso();
		return $this->control->all($id);
	}

	public function editConcurso($idconcurso, $nome, $descricao, $remuneracao, $vagas, $cliente_idcliente){
		$this->control = new Concurso();
		$this->control->Edit($idconcurso, $nome, $descricao, $remuneracao, $vagas, $cliente_idcliente);
	}

	public function cadConcurso($nome, $descricao, $remuneracao, $vagas, $cliente_idcliente){
		$this->control = new Concurso();
		$this->control->Cad($nome, $descricao, $remuneracao, $vagas, $cliente_idcliente);
	}	
	
	public function delConcurso($id){
		$this->control = new Concurso();
		$this->control->Del($id);
	}	

/*	----------------------- concurso -------------------------------------*/	
	

/*	----------------------- cliente -------------------------------------*/


    public function Controle_cliente($id){
		$this->control = new Cliente();
		return $this->control->all($id);
	}

	public function editCliente($idcliente, $nome, $cnpj, $senha, $bairro, $complemento, $cidade, $estado, $cep, $endereco, $email, $telefone, $site){
		$this->control = new Cliente();
		$this->control->Edit($idcliente, $nome, $cnpj, $senha, $bairro, $complemento, $cidade, $estado, $cep, $endereco, $email, $telefone, $site);
	}

	public function passCliente($idcliente, $senha){
		include("../../plugins/Password/PASSWORD.php");
		$this->control = new Cliente();
		$this->control->Password($id_estabelecimento, PASSWORD::hash($senha));
	}

	/*	----------------------- cliente -------------------------------------*/
	
	
	/*	----------------------- venda -------------------------------------*/

    public function Controle_venda($id){
		$this->control = new Venda();
		return $this->control->all($id);
	}

	public function editVenda(){
		$this->control = new Venda();
		$this->control->Edit();
	}

	public function cadVenda($nome, $idcurso, $idconcurso, $valor, $capa){
		$this->control = new Venda();
		$this->control->Cad($nome, $idcurso, $idconcurso, $valor, $capa);
	}	
	
	public function delVenda($id){
		$this->control = new Venda();
		$this->control->Del($id);
	}		

	/*	----------------------- venda -------------------------------------*/		

}

?>
