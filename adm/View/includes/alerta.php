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
		case "cad":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Cadastrado com sucesso !</strong></li>
				</ul>";
		break;
		case "edit":
			echo "<ul class=\"system_messages\">
						<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Editado com sucesso !</strong></li>
				</ul>";
		break;
		case "del":
			echo "<ul class=\"system_messages\">
					<li class=\"green\"><span class=\"ico\"></span><strong class=\"system_title\">Deletado com sucesso !</strong></li>
				</ul>";
		break;
	}
}
?>