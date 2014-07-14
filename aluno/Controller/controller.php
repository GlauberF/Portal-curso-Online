<?php
require('../Model/connectDB.php');
require('../Model/versao.class.php');
require('../Model/aluno.class.php');
require('../Model/media.class.php');
require('../Model/cliente.class.php');
require('../Model/estados.class.php');
require('../Model/cidades.class.php');
//require('../Model/configuracao.class.php');
//require('../Model/contato.class.php');
require('../Model/aula.class.php');
require('../Model/material.class.php');
//require('../Model/concurso.class.php');
require('../Model/curso.class.php');
//require('../Model/professor.class.php');
//require('../Model/venda.class.php');
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


	

	



	/*	----------------------- controle versao -------------------------------------*/
	public function Estatic_version(){
		$this->control = new Versao();
		return $this->control->estatic();
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
	

	/*	----------------------- cliente -------------------------------------*/

	

    
    
	/*	----------------------- aluno -------------------------------------*/


    public function Controle_aluno($id){
		$this->control = new Aluno();
		return $this->control->all($id);
	}

	public function editAluno($idaluno, $nome, $email, $tel, $cel, $endereco, $complemento, $bairro, $cep, $cidade, $estado){
		$this->control = new Aluno();
		$this->control->Edit($idaluno, $nome, $email, $tel, $cel, $endereco, $complemento, $bairro, $cep, $cidade, $estado);
	}
	
	public function senha($id, $password){
		include("../../plugins/Password/PASSWORD.php");
		$this->control = new Aluno();
		$this->control->PASSAluno($id, PASSWORD::hash($password));
	}	
	

	/*	----------------------- aluno -------------------------------------*/	    
	
	
	
	
	/*	----------------------- concurso -------------------------------------*/

    public function Controle_concurso($id, $cliente){
		$this->control = new Concurso();
		return $this->control->all($id, $cliente);
	}

	/*	----------------------- concurso -------------------------------------*/		
	
	
	/*	----------------------- professor -------------------------------------*/
	
	    public function Controle_professor($id, $cliente){
			$this->control = new Professor();
			return $this->control->all($id, $cliente);
		}
		
	/*	----------------------- professor -------------------------------------*/		
	
	
	
    
	
	/*	----------------------- aula -------------------------------------*/

    public function Controle_aula($id, $curso){
		$this->control = new Aula();
		return $this->control->all($id, $curso);
	}

	/*	----------------------- aula -------------------------------------*/	
	
	
	/*	----------------------- material -------------------------------------*/

    public function Controle_material($id){
		$this->control = new Material();
		return $this->control->all($id);
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

	/*	----------------------- venda -------------------------------------*/		
	
	

	
	/*	----------------------- compra -------------------------------------*/				
	
    public function Controle_compra($id, $aluno){
		$this->control = new Compra();
		return $this->control->all($id, $aluno);
	}	
	
    public function Controle_compracurso($id){
		$this->control = new Compra();
		return $this->control->CompraCurso($id);    	
    }
		
	/*	----------------------- compra -------------------------------------*/		
	

	/*	----------------------- aula venda -------------------------------------*/

    public function Controle_AulaVenda($id){
		$this->control = new Compra();
		return $this->control->AulaVenda($id);
	}

	/*	----------------------- aula venda -------------------------------------*/		
	
	
	/*	----------------------- curso::cursoativo -------------------------------------*/

    public function Curso_Ativo($id){
		$this->control = new Curso();
		return $this->control->AulaVenda($id);
	}

	/*	----------------------- curso::cursoativo -------------------------------------*/		
	
}

?>
