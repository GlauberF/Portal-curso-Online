<?php
include('includes/auth.php');
require('../Controller/controller.php');

if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']) {
		case "edit_senha":
			$cad = new Control();
			$cad->passCliente($_POST["idcliente"], $_POST["senha"]);
		break;
		case "edit":
			$cad = new Control();
			$cad->editCliente($_POST["idcliente"], $_POST["nome"], $_POST["cnpj"], $_POST["bairro"], $_POST["complemento"], $_POST["cidade"], $_POST["estado"], $_POST["cep"], $_POST["endereco"], $_POST["email"], $_POST["telefone"], $_POST["site"]);
		break;
		case "config":
			$cad = new Control();
			$cad->configCliente($_POST["folder"], $_POST["idcliente"], $_POST["ativo"], $_POST["online"]?1:0, $_POST["simulado"]?1:0);
		break;
		case "img":
			$cad = new Control();
			$cad->logoCliente($_POST["idcliente"], $_FILES['logo']);
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
			<?php include('includes/header.php'); ?>
			<div id="menus_wrapper">
				<div id="main_menu">
					<ul>
						<li><a href="index.php"><span><span>Home</span></span></a></li>
						<li><a href="#" class="selected"><span><span>Curso-online</span></span></a></li>						
						<li><a href="simulado.php"><span><span>Simulado</span></span></a></li>												
					</ul>
				</div>
				<div id="sec_menu">
					<ul>
						<li><a href="online.php" class="sm5">Voltar</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="content">
			<div id="page">
				<div class="inner">
					<div class="section">
						<div class="title_wrapper">
							<h2>Home</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<div class="section_content">
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
												<div class="dashboard_menu_wrapper">
												<ul class="dashboard_menu">
													<li><a href="aluno.php?ed=<?=$_GET["ed"]?>" class="d13"><span>Alunos</span></a></li>
													<li><a href="parceiro.php?ed=<?=$_GET["ed"]?>" class="d16"><span>Parceiros</span></a></li>
													<li><a href="concurso.php?ed=<?=$_GET["ed"]?>" class="d14"><span>Cursos</span></a></li>
													<li><a href="curso.php?ed=<?=$_GET["ed"]?>" class="d15"><span>Disciplinas</span></a></li>
													<li><a href="aula.php?ed=<?=$_GET["ed"]?>" class="d5"><span>Aulas</span></a></li>
													<li><a href="material.php?ed=<?=$_GET["ed"]?>" class="d2"><span>Material</span></a></li>
													<li><a href="vendas.php?ed=<?=$_GET["ed"]?>" class="d20"><span>Vendas</span></a></li>													
													<li><a href="gateway.php?ed=<?=$_GET["ed"]?>" class="d12"><span>Pagseguro</span></a></li>																										
													<li><a href="layout.php?ed=<?=$_GET["ed"]?>" class="d17"><span>Layout</span></a></li>																																							
													<li><a href="financeiro.php?ed=<?=$_GET["ed"]?>" class="d9"><span>Financeiro</span></a></li>																																																				
													<li><a href="config.php?ed=<?=$_GET["ed"]?>" class="d8"><span>Configuração</span></a></li>																																																																	
												</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
						</div>
					</div>
					<div class="section table_section">
						<div class="title_wrapper">
							<h2>Cliente</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<div class="section_content">
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">

												<div id="tabs">
												  <ul>
												    <li><a href="#tabs-2">Editar</a></li>
												    <li><a href="#tabs-3">Configurações</a></li>
												  </ul>
												  <div id="tabs-2">
													<?php
														$c = new Control();
														$arr = $c->Controle_cliente($_GET['ed']);
														for ($i = 0; $i < count($arr); $i++){

													?>
														<h3>Editar cliente</h3>

														<form id="Cliente" action="online_cliente.php?action=edit" method="POST" class="search_form general_form">
															<fieldset>
																<div class="forms">
																	<div class="row">
																		<label>Nome:</label>
																		<div class="inputs">
																			<span class="input_wrapper">
																				<input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome do cliente não pode ficar em branco." />
																				<input name="idcliente" value="<?=$arr[$i]->idcliente['idcliente']?>" type="hidden" />
																			</span>
																			<span class="system negative"></span>
																		</div>
																	</div>
																	<div class="row">
																		<label>Cnpj:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="cnpj" id="cnpj" value="<?=$arr[$i]->cnpj['cnpj']?>" type="text" title="O nome CNPJ não pode ficar em branco." /></span>
																			<span class="system negative"></span>
																		</div>
																	</div>																	
																	<div class="row">
																		<label>Email:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="email" id="email" value="<?=$arr[$i]->email['email']?>" type="text" title="Formato do email inválido." /></span>
																			<span class="system negative"></span>
																		</div>
																	</div>
																	<div class="row">
																		<label>Endereço:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="endereco" id="endereco" value="<?=$arr[$i]->endereco['endereco']?>" type="text" title="O endereço não pode ficar em branco." /></span>
																			<span class="system negative"></span>
																		</div>
																	</div>
																	<div class="row">
																		<label>Complemento:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="complemento" id="complemento" value="<?=$arr[$i]->complemento['complemento']?>" type="text" title="O endereço não pode ficar em branco." /></span>
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
																	<div class="row">
																		<label>Cep:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="cep" id="cep" value="<?=$arr[$i]->cep['cep']?>" type="text" title="Verifique o cep." /></span>
																			<span class="system negative"></span>
																		</div>
																	</div>
																	<div class="row">
																		<label>Tel:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="telefone" value="<?=$arr[$i]->telefone['telefone']?>" id="telefone" type="text" /></span>
																		</div>
																	</div>
																	<div class="row">
																		<label>Site:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="site" value="<?=$arr[$i]->site['site']?>" id="site" type="text" /></span>
																		</div>
																	</div>
																	<div class="row">
																		<div class="buttons">
																			<ul>
																				<li><span class="button send_form_btn"><span><span>Editar</span></span><input name="" type="submit" /></span></li>
																				<li><span class="button cancel_btn"><span><span>Limpar</span></span><input name="" type="reset" /></span></li>
																				<li><span class="button cancel_btn"><span><span><a class='inline' href="#inline_content">Alterar senha</a></span></span></span></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</fieldset>
														</form>
														<div style='display:none'>
															<div id='inline_content' style='padding:10px; background:#fff;'>
																<form id="estabelecimento" action="vi_cliente.php?action=edit_senha" method="POST" class="search_form general_form">
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
																					<span class="input_wrapper"><input name="idcliente" value="<?=$arr[$i]->idcliente['idcliente']?>" type="hidden" /><input class="text" name="senha2" id="senha2" type="password" title="As senhas tem que ser iguais." /></span>
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
													?>
												  </div>
												  <div id="tabs-3">
														<h3>Configurações</h3>
														<?php
															$c = new Control();
															$arr = $c->Controle_cliente($_GET['ed']);
															for ($i = 0; $i < count($arr); $i++){
	
														?>														
														<form id="cliente" action="online_cliente.php?action=config" method="POST" class="search_form general_form">
															<fieldset>
																<div class="forms">
																	<div class="row">
																		<label>Cliente ativo:</label>
																		<div class="inputs">																			
																			<ul>
																				<li><input class="radio" name="ativo" value="1" type="radio" <?=$arr[$i]->ativo['ativo']?'checked':''?> /> Sim</li>
																				<li><input class="radio" name="ativo" value="0" type="radio" <?=!$arr[$i]->ativo['ativo']?'checked':''?> /> Não</li>
																			</ul>																			
																		</div>
																	</div>
																	<div class="row">
																		<label>Folder:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="folder" value="<?=$arr[$i]->folder['folder']?>" id="folder" type="text" /><input name="idcliente" value="<?=$arr[$i]->idcliente['idcliente']?>" id="idcliente" type="hidden" /></span>
																		</div>
																	</div>
																	<div class="row">
																		<label>Serviços:</label>
																		<div class="inputs">																			
																			<ul>
																				<li><input class="checkbox" name="online" value="1" type="checkbox" <?=$arr[$i]->online['online']?'checked':''?> /> Simulado Online</li>
																				<li><input class="checkbox" name="simulado" value="1" type="checkbox" <?=$arr[$i]->simulado['simulado']?'checked':''?> /> Curso Online</li>
																			</ul>																			
																		</div>
																	</div>																																		
																	<div class="row">
																		<div class="buttons">
																			<ul>
																				<li><span class="button send_form_btn"><span><span>Salvar</span></span><input name="" type="submit" /></span></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</fieldset>
														</form>
														<?php
															}
														?>																												
												  </div>
												</div>											
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
					<!--[if !IE]>end section<![endif]-->
				</div>
			</div>
			<!--[if !IE]>end page<![endif]-->

			<!--[if !IE]>start sidebar<![endif]-->
			<div id="sidebar">
				<div class="inner">
				<?php include('includes/logo.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>

