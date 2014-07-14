<?php
	$arr = $c->Controle_aluno($_SESSION['idAluno']);
	for ($i = 0; $i < count($arr); $i++){
?>
<div class="quick_info">
	<div class="quick_info_top">
		<h2>Meus dados</h2>
	</div>
	<div class="quick_info_content">
		<dl>
			<dt>Nome:</dt>
			<dd><?=$arr[$i]->nome['nome']?></dd>
		</dl>
		<dl>
			<dt>E-mail:</dt>
			<dd><?=$arr[$i]->email['email']?></dd>
		</dl>
		<dl>
			<dt>CPF:</dt>
			<dd><?=$arr[$i]->cpf['cpf']?></dd>
		</dl>
	</div>
	<span class="quick_info_bottom"></span>
</div>
<?php
	}
?>
