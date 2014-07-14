<?php

class Media {

	public $id_media;
	public $nome_media;
	public $endereco_media;
   public $id_estabelecimento_id;
   public $capa;
   public $visualizar_media;
   public $capa_principal;

	protected function setid_media($id_media){
		$this->id_media = $id_media;
	}

	protected function setnome_media($nome_media){
		$this->nome_media = $nome_media;
	}

	protected function setendereco_media($endereco_media){
		$this->endereco_media = $endereco_media;
	}

	protected function setid_estabelecimento_id($id_estabelecimento_id){
		$this->id_estabelecimento_id = $id_estabelecimento_id;
	}

	protected function setcapa($capa){
		$this->capa = $capa;
	}

	protected function setcapa_principal($capa_principal){
		$this->capa_principal = $capa_principal;
	}

	protected function setvisualizar_media($visualizar_media){
		$this->visualizar_media = $visualizar_media;
	}

	public function all($id_estabelecimento_id){

		if($id_estabelecimento_id == ""){
			$sql = "SELECT * FROM `media`;";
			$vai = new MySQLDB();
			$result = $vai->ExecuteQuery($sql);
		}else{
			$sql = "SELECT * FROM `media` WHERE `id_estabelecimento_id` = $id_estabelecimento_id;";
			$vai = new MySQLDB();
			$result = $vai->ExecuteQuery($sql);
		}
		while($dados = mysql_fetch_array($result)){
			$cliente = new Media();
			$cliente->setid_media(array('id_media' => $dados['id_media']));
			$cliente->setnome_media(array('nome_media' => $dados['nome_media']));
			$cliente->setendereco_media(array('endereco_media' => $dados['endereco_media']));
			$cliente->setid_estabelecimento_id(array('id_estabelecimento_id' => $dados['id_estabelecimento_id']));
			$cliente->setcapa(array('capa' => $dados['capa']));
			$cliente->setcapa_principal(array('capa_principal' => $dados['capa_principal']));
			$cliente->setvisualizar_media(array('visualizar_media' => $dados['visualizar_media']));
			$arr[] = $cliente;
		}

		return $arr;
	}

	public function allView($id_estabelecimento_id){

		$sql = "SELECT `nome_media` FROM `nome_media` WHERE `id_estabelecimento_id` = $id_estabelecimento_id LIMIT 0,1;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);

		while($dados = mysql_fetch_array($result)){
			$cliente = new Media();
			$cliente->setnome_media(array('nome_media' => $dados['nome_media']));
			$arr[] = $cliente;
		}

		return $arr;
	}

	public function intoMedia($endereco_media, $id_estabelecimento_id, $nome_media){

		$vai = new MySQLDB();
		$sql = "SELECT `folder_estabelecimento` FROM `estabelecimento` WHERE `id_estabelecimento`=$id_estabelecimento_id;";
		$result = $vai->ExecuteQuery($sql);

		while ($rows = mysql_fetch_object($result)) {
			$folder = $rows->folder_estabelecimento;
		}
		if($folder == ""){
			header ("Location: vi_estabelecimento.php?vi=nao_folder&ed=$id_estabelecimento_id");
			exit();
		}

		foreach($endereco_media['name'] as $key => $ui){

		   $tam_img = getimagesize($endereco_media['tmp_name'][$key]);
			if($tam_img[0] > 870){
					include("../../plugins/SimpleImage/SimpleImage.php");

		         $image = new SimpleImage();
		         $image->load($endereco_media['tmp_name'][$key]);
		         $image->resizeToWidth(870);
		         $image->save($endereco_media['tmp_name'][$key]);
			}

         if (strpos($endereco_media['type'][$key], "image") === false) {
				$c++;
				$erro .= "$c - A foto não &eacute; uma imagem. Arquivo:".$endereco_media['name'][$key]."<br />";
			}else{
				$nome_original = $endereco_media['name'][$key];
				list($nome_arquivo, $extensao_arquivo) = explode(".", $nome_original);

				$ds90 = str_replace(" ", "_", $nome_arquivo);
				$numero_reg = rand(1,999);
				$nome_aleatorio_arquivo = $ds90 . "_foto_" . $numero_reg;
				$logo = "../../../img/bares/" . $folder . "/" . $nome_aleatorio_arquivo . "." . $extensao_arquivo;
				$logo_bd = "bares/" . $folder . "/" . $nome_aleatorio_arquivo . "." . $extensao_arquivo;

				if (!move_uploaded_file($endereco_media['tmp_name'][$key], "./$logo")) {
					$c++;
					$erro .= "$c - Erro no envio da foto.<br />";
				}else{

					$sql = "INSERT INTO `media` (`nome_media`, `endereco_media`, `id_estabelecimento_id`, `capa`, `visualizar_media`) VALUES ('$nome_media', '$logo_bd', $id_estabelecimento_id, 0, 0);";
					$vai = new MySQLDB();
					$vai->ExecuteQuery($sql);
				}
			}
 		}
		if ($erro == ""){
			header ("Location: vi_estabelecimento.php?vi=foto_upload&ed=$id_estabelecimento_id");
		}else{
			header ("Location: vi_estabelecimento.php?vi=erro_foto_upload&error=".$erro);
		}
	}

	public function deletemedia($id_media, $id_estabelecimento){
		$sql = "SELECT `endereco_media` FROM `media` WHERE `id_media` = $id_media;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		$action2 = $objeto->endereco_media;
		$del1 = "../../../".$action2;
		@unlink("$del1");
		$sql = "DELETE FROM `media` WHERE id_media=$id_media;";
		$vai = new MySQLDB();
		$vai->ExecuteQuery($sql);
		header ("Location: media.php?vi=del_media&nu=$id_estabelecimento");
	}

	public function mudacapa($id_media, $id_estabelecimento){
		$sql = "SELECT `capa` FROM `media` WHERE `id_estabelecimento_id` = $id_estabelecimento AND `capa` = 1;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$rows = mysql_num_rows($result);
		if($rows == 1){
			header ("Location: media.php?vi=dupla_capa&nu=$id_estabelecimento");
		}else{
			$sql = "UPDATE `media` SET `capa`=1 WHERE `id_media`=$id_media;";
			$vai = new MySQLDB();
			$vai->ExecuteQuery($sql);
			header ("Location: media.php?vi=capa&nu=$id_estabelecimento");
		}
	}

	public function RECORTE($id_media, $id){

	  $sql = "SELECT `endereco_media` FROM `media` WHERE `id_media` = $id_media;";
	  $vai = new MySQLDB();
	  $result = $vai->ExecuteQuery($sql);
	  $objeto = mysql_fetch_object($result);
	  $action2 = $objeto->endereco_media;
	  $imagem = "../../../".$action2;

	  include("../../plugins/SimpleImage/SimpleImage.php");

	  $image = new SimpleImage();
	  $image->load($imagem);

     $x2 = $centreX + 870;
     $y2 = $centreY + 420;

     $image->cutFromCenter(870, 420);
	  $image->save($imagem);

	  header ("refresh:0; url=media.php?vi=recorte&nu=$id");

	}

	public function capaprincipal($id_media, $id_estabelecimento){
		$sql = "SELECT `capa_principal` FROM `media` WHERE `id_estabelecimento_id` = $id_estabelecimento AND `capa_principal` = 1;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$rows = mysql_num_rows($result);
		if($rows == 1){
			header ("Location: media.php?vi=dupla_principal&nu=$id_estabelecimento");
		}else{
			$sql = "UPDATE `media` SET `capa_principal`=1 WHERE `id_media`=$id_media;";
			$vai = new MySQLDB();
			$vai->ExecuteQuery($sql);
			header ("Location: media.php?vi=capaprincipal&nu=$id_estabelecimento");
		}
	}

	public function visu($id_media, $id_estabelecimento){
		$sql = "SELECT `visualizar_media` FROM `media` WHERE `id_media` = $id_media;";
		$vai = new MySQLDB();
		$result = $vai->ExecuteQuery($sql);
		$objeto = mysql_fetch_object($result);
		$action2 = $objeto->visualizar_media;
		if($action2 == 1){
			$sql = "UPDATE `media` SET `visualizar_media`=0 WHERE `id_media`=$id_media;";
			$vai = new MySQLDB();
			$vai->ExecuteQuery($sql);
			header ("Location: media.php?vi=visu&nu=$id_estabelecimento");
		}else{
			$sql = "UPDATE `media` SET `visualizar_media`=1 WHERE `id_media`=$id_media;";
			$vai = new MySQLDB();
			$vai->ExecuteQuery($sql);
			header ("Location: media.php?vi=visu&nu=$id_estabelecimento");
		}
	}

}

?>