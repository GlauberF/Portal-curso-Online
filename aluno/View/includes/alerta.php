<?php
if(isset($_REQUEST['vi'])){
	switch ($_REQUEST['vi']) {
		case "erro_login":
			echo "<div class=\"error\">
					<div class=\"error_inner\">
						<strong>Acesso negado</strong> | <span>Combina&ccedil;ão user/senha errados</span>
					</div>
				</div>";
		break;
		case "senhaOK":
			echo "<div class=\"error\">
					<div class=\"error_inner\">
						<strong>Sucesso</strong> | <span>Senha alterada, acesse o painel</span>
					</div>
				</div>";
		break;
		case "email_erro":
			echo "<div class=\"error\">
					<div class=\"error_inner\">
						<strong>Erro</strong> | <span>Esse email não está cadastrado</span>
					</div>
				</div>";
		break;
		case "email_sent":
			echo "<div class=\"error\">
					<div class=\"error_inner\">
						<span>Um email foi enviado. Verifique a sua caixa de entrada.</span>
					</div>
				</div>";
		break;
		case "email_notsent":
			echo "<div class=\"error\">
					<div class=\"error_inner\">
						<strong>Erro</strong> | <span>Um erro aconteceu ao enviar. Tente novamente.</span>
					</div>
				</div>";
		break;
		case "cad_bebida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Bebida cadastrada com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_bebida":
			echo "<ul class=\"system_messages\">
						<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Bebida editada com sucesso !</strong></li>
				</ul>";
		break;
		case "del_bebida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Bebida deletada com sucesso !</strong></li>
				</ul>";
		break;
		case "cad_comida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Comida cadastrada com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_comida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Comida editada com sucesso !</strong></li>
				</ul>";
		break;
		case "del_comida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Comida deletada com sucesso !</strong></li>
				</ul>";
		break;
		case "controle_cad":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Uma nova versão foi cadastrada com sucesso !</strong></li>
				</ul>";
		break;
		case "controle_del":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Uma versão foi deletada com sucesso !</strong></li>
				</ul>";
		break;
		case "controle_edit":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Uma versão foi editada com sucesso !</strong></li>
				</ul>";
		break;
		case "cad_estabelecimento":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Estabelecimento cadastrado com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_estabelecimento":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Estabelecimento editado com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_descricao_estabelecimento":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Descrição do estabelecimento editada com sucesso !</strong></li>
				</ul>";
		break;
		case "del_estabelecimento":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Estabelecimento deletado com sucesso !</strong></li>
				</ul>";
		break;
		case "senha_estabelecimento":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">A senha do estabelecimento foi editada com sucesso !</strong></li>
				</ul>";
		break;
		case "cad_tipo_bebida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Tipo de bebida cadastrado com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_tipo_bebida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Tipo de bebida editado com sucesso !</strong></li>
				</ul>";
		break;
		case "del_tipo_bebida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Tipo de bebida deletado com sucesso !</strong></li>
				</ul>";
		break;
		case "cad_usuario_admin":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Usuário cadastrado com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_usuario_admin":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Usuário editado com sucesso !</strong></li>
				</ul>";
		break;
		case "del_usuario_admin":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Usuário deletado com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_senha_user":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Senha do usuário atualizada com sucesso !</strong></li>
				</ul>";
		break;
		case "cad_tipo_comida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Tipo de comida cadastrada com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_tipo_comida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Tipo de comida editada com sucesso !</strong></li>
				</ul>";
		break;
		case "del_tipo_comida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Tipo de comida deletada com sucesso !</strong></li>
				</ul>";
		break;
		case "folder_estabelecimento":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Folder do estabelecimento cadastrada com sucesso !</strong></li>
				</ul>";
		break;
		case "erro_ativa_estabelecimento":
			echo "<ul class=\"system_messages\">
						<li class=\"red\"><span class=\"ico\"></span><strong class=\"system_title\">Você tem que criar uma pasta para ativar este estabelecimento.</strong></li>
				</ul>";
		break;
		case "nao_folder":
			echo "<ul class=\"system_messages\">
						<li class=\"red\"><span class=\"ico\"></span><strong class=\"system_title\">Você tem que criar uma pasta para fazer o upload da imagem.</strong></li>
				</ul>";
		break;
	
		case "cad_propaganda":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Propaganda cadastrada com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_propaganda":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Propaganda editada com sucesso !</strong></li>
				</ul>";
		break;
		case "erro_propaganda_foto":
			echo "<ul class=\"system_messages\">
						<li class=\"red\"><span class=\"ico\"></span><strong class=\"system_title\">Erro ao editar a imagem da propaganda: ". $_REQUEST['erro'] ." !</strong></li>
				</ul>";
		break;
		case "del_propaganda":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Propaganda deletada com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_foto_propaganda":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Imagem da propaganda editada com sucesso !</strong></li>
				</ul>";
		break;
	
	
		case "cad_promocao":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Promoção cadastrada com sucesso !</strong></li>
				</ul>";
		break;
		case "erro_promocao":
			echo "<ul class=\"system_messages\">
						<li class=\"red\"><span class=\"ico\"></span><strong class=\"system_title\">Erro ao editar a imagem da promoção: ". $_REQUEST['erro'] ." !</strong></li>
				</ul>";
		break;
		case "edit_promocao":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Promoção editada com sucesso !</strong></li>
				</ul>";
		break;
		case "del_promocao":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Promoção deletada com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_foto_promocao":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Imagem da promoção editada com sucesso !</strong></li>
				</ul>";
		break;
	
		case "foto_upload":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\"> Imagem cadastrada com sucesso !</strong></li>
				</ul>";
		break;
		case "erro_foto_upload":
			echo "<ul class=\"system_messages\">
						<li class=\"red\"><span class=\"ico\"></span><strong class=\"system_title\">Erro ao cadastrar imagem: ". $_REQUEST['erro'] ." !</strong></li>
				</ul>";
		break;
		case "del_media":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\"> Media deletada com sucesso !</strong></li>
				</ul>";
		break;
		case "dupla_capa":
			echo "<ul class=\"system_messages\">
					<li class=\"red\"><span class=\"ico\"></span><strong class=\"system_title\"> Já existe uma foto na index para este estabelecimento !</strong></li>
				</ul>";
		break;
		case "capa":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Capa escolhida com sucesso !</strong></li>
				</ul>";
		break;
		case "visu":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Visualização alterada com sucesso !</strong></li>
				</ul>";
		break;
		case "capaprincipal":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Capa principal esccolhida com sucesso !</strong></li>
				</ul>";
		break;
		case "dupla_principal":
			echo "<ul class=\"system_messages\">
					<li class=\"red\"><span class=\"ico\"></span><strong class=\"system_title\"> Já existe uma capa para este estabelecimento !</strong></li>
				</ul>";
		break;
		case "contato_enviado":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Mensagem enviada com sucesso !</strong></li>
				</ul>";
		break;
		case "del_contato":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Mensagem deletada com sucesso !</strong></li>
				</ul>";
		break;
		case "edit_configuracao":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Configuração editada com sucesso !</strong></li>
				</ul>";
		break;
		case "cad_divisao_bebida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Divisão cadastrada com sucesso !</strong></li>
				</ul>";
		break;
		case "del_divisao_bebida":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Divisão deletada com sucesso !</strong></li>
				</ul>";
		break;
	}
}
?>