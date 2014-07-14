<?php

	include('includes/auth.php');

	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "edit":
				$cad = new Control();
				$cad->editAluno($_POST['idaluno'], $_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['tel'], $_POST['cel'], $_POST['endereco'], $_POST['complemento'], $_POST['bairro'], $_POST['cep'], $_POST['cidade'], $_POST['estado'], $_POST['cliente_idcliente']);
			break;
			case "senha":
				$cad = new Control();
				$cad->senha($_POST['idaluno'], $_POST['senha'], $_POST['cliente_idcliente']);
			break;			
		}
	}	

?>
<?php include('includes/head.php'); ?>
<body>
	<!--[if !IE]>start wrapper<![endif]-->
	<div id="wrapper">
		<!--[if !IE]>start head<![endif]-->
		<div id="head">
			<? include('includes/header.php') ?>
			<div id="menus_wrapper">
				<div id="main_menu">
					<ul>
						<li><a href="index.php"><span><span>Home</span></span></a></li>
						<li><a href="online.php" class="selected"><span><span>Curso-online</span></span></a></li>						
						<li><a href="simulado.php"><span><span>Simulado</span></span></a></li>						
					</ul>
				</div>
				<div id="sec_menu">
					<ul>
						<li><a href="aluno.php?ed=<?=$_GET["ed"]?>" class="sm5">Voltar</a></li>						
					</ul>				
				</div>
			</div>
		</div>
		<div id="content">
			<div id="page">
				<div class="inner">
					<? include('includes/alerta.php') ?>				
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Edite aluno</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<!--[if !IE]>end title wrapper<![endif]-->
						<!--[if !IE]>start section content<![endif]-->
						<div class="section_content">
							<!--[if !IE]>start section content top<![endif]-->
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
												<?php
													if(isset($_GET['nu'])){
														$c = new Control();
														$arr = $c->Controle_aluno($_GET['nu'], $_GET['ed'] = null);
														for ($i = 0; $i < count($arr); $i++){
												?>											
												<h3>Editar aluno: <?=$arr[$i]->nome['nome']?></h3>
												<form id="Aluno" action="?action=edit" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome não pode ficar em branco." />
																		<input name="idaluno" id="idaluno" value="<?=$arr[$i]->idaluno['idaluno']?>" type="hidden" />
																		<input name="cliente_idcliente" id="cliente_idcliente" value="<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>" type="hidden" />																	
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Email:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="email" value="<?=$arr[$i]->email['email']?>" id="email" type="text" title="Não está me parecendo um email válido." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Cpf:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="cpf" id="cpf" value="<?=$arr[$i]->cpf['cpf']?>" type="text" /></span>
																	<span class="system negative"></span>
																</div>
															</div>															
															<div class="row">
																<label>Endereço:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="endereco" value="<?=$arr[$i]->endereco['endereco']?>" id="endereco" type="text" title="O endereço não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Complemento:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="complemento" value="<?=$arr[$i]->complemento['complemento']?>" id="complemento" type="text" title="O endereço não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>															
															<div class="row">
																<label>Bairro:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="bairro" id="bairro" value="<?=$arr[$i]->bairro['bairro']?>" type="text" title="O bairro não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<?php
															if(!$arr[$i]->cidade['cidade']){
															?>
															<div class="row">
																<label>Estado:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="estado" id="estado" title="">
																			<?php
																				$c = new Control();
																				$arre = $c->Controle_estados($idi);
																				for ($j = 0; $j < count($arre); $j++){
																			?>
																			<option value="<?php print $arre[$j]->cod_estados['cod_estados']; ?>"><?php print $arre[$j]->sigla['sigla']; ?></option>
																			<?php
																				}
																			?>
																		</select>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Cidade:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<span class="carregando">Aguarde, carregando...</span>
																		<select name="cidade" id="cidade">
																			<option value="">-- Escolha um estado --</option>
																		</select>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>															
															<?php
															}else{
															?>
															<div class="row">
																<label>Cidade:</label>
																<?php
																	$c = new Control();
																	$arre = $c->Controle_cidades($arr[$i]->cidade['cidade']);
																	for ($j = 0; $j < count($arre); $j++){
																?>
																	<input type="hidden" name="estado" value="<?=$arr[$i]->estado['estado']?>" /><input type="hidden" name="cidade" value="<?=$arr[$i]->cidade['cidade']?>" /><?php print $arre[$j]->cidade['cidade']; ?>, <?php print $arre[$j]->estado['estado']; ?>
																<?php
																	}
																?>
															</div>
															<?php
															}
															?>															
															
															<div class="row">
																<label>Cep:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="cep" id="cep" value="<?=$arr[$i]->cep['cep']?>" type="text" title="Verifique o cep" /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Tel:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="tel" value="<?=$arr[$i]->tel['tel']?>" id="tel" type="text" /></span>
																</div>
															</div>
															<div class="row">
																<label>Cel:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="cel" id="cel" value="<?=$arr[$i]->cel['cel']?>" type="text" /></span>
																</div>
															</div>

															<div class="row">
																<div class="buttons">
																	<ul>
																		<li><span class="button send_form_btn"><span><span>Atualizar</span></span><input name="" type="submit" /></span></li>
																	</ul>
																</div>
															</div>
														</div>
													</fieldset>
												</form>
														<div style='display:none'>
															<div id='inline_content' style='padding:10px; background:#fff;'>
																<form id="alunoSenha" action="edit_aluno.php?action=senha" method="POST" class="search_form general_form">
																	<fieldset>
																		<div class="forms">
																			<div class="row">
																				<label>Senha:</label>
																				<div class="inputs">
																					<span class="input_wrapper"><input class="text" name="senha" id="senha" class="password_test" onkeyup="passwordStrength(this.value)" type="password" title="Verifique a senha" /></span>
																					<span class="system negative"></span>
																				</div>
																			</div>
																			<div class="row">
																				<p>
																					<label for="passwordStrength">Password strength</label>
																					<div id="passwordDescription">Password not entered</div>
																					<div id="passwordStrength" class="strength0"></div>
																				</p>
																			</div>
																			<div class="row">
																				<label>Repita a senha:</label>
																				<div class="inputs">
																					<span class="input_wrapper">
																						<input name="idaluno" value="<?=$arr[$i]->idaluno['idaluno']?>" type="hidden" />
																						<input name="cliente_idcliente" value="<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>" type="hidden" />																						
																						<input class="text" name="senha2" id="senha2" type="password" title="As senhas tem que ser iguais." />
																					</span>
																					<span class="system negative"></span>
																				</div>
																			</div>
																			<div class="row">
																				<div class="buttons">
																					<ul>
																						<li><span class="button send_form_btn"><span><span>Editar</span></span><input name="" type="submit" /></span></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																</form>
															</div>
														</div>												
												<?php
													}
												}
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
						</div>
					</div>
				</div>
			</div>
			<div id="sidebar">
				<div class="inner">
				<?php //include('includes/info_estabelecimento.php'); ?>
					<!--[if !IE]>start section<![endif]-->	
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Menu</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<!--[if !IE]>end title wrapper<![endif]-->
						<!--[if !IE]>start section content<![endif]-->
						<div class="section_content">
							<!--[if !IE]>start section content top<![endif]-->
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
												<ul class="sidebar_menu">
													<li><a class='inline' href="#inline_content">Alterar senha</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--[if !IE]>end section content top<![endif]-->
							<!--[if !IE]>start section content bottom<![endif]-->
							<span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
							<!--[if !IE]>end section content bottom<![endif]-->
							
						</div>
						<!--[if !IE]>end section content<![endif]-->
					</div>
					<?php include('includes/menu.php'); ?>
					<!--[if !IE]>end section<![endif]-->		
					
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
		<script type="text/javascript">
		$(function(){
			$('#estado').change(function(){
				if( $(this).val() ) {
					$('#cidade').hide();
					$('.carregando').show();
					$.getJSON('cidades.ajax.php?search=',{estado: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value=""></option>';
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
						}
						$('#cidade').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
				}
			});
		});
		</script>	
</body>
</html>