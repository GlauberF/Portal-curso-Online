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
				$cad->editCliente($_POST["idcliente"], $_POST["nome"], $_POST["cnpj"], $_POST["senha"], $_POST["bairro"], $_POST["complemento"], $_POST["cidade"], $_POST["estado"], $_POST["cep"], $_POST["endereco"], $_POST["email"], $_POST["telefone"], $_POST["site"]);
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
			<? include('includes/header.php') ?>
			<div id="menus_wrapper">
				<div id="main_menu">
					<ul>
						<li><a href="#" class="selected"><span><span>Home</span></span></a></li>
						<li><a href="online.php"><span><span>Curso-online</span></span></a></li>						
						<li><a href="simulado.php"><span><span>Simulado</span></span></a></li>							
					</ul>
				</div>
				<div id="sec_menu">
					<ul>
						<li><a href="cliente.php" class="sm5">Voltar</a></li>						
					</ul>				
				</div>
			</div>
		</div>
		<div id="content">
			<div id="page">
				<div class="inner">
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Cliente</h2>

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

														<form id="clienteEdit" action="vi_cliente.php?action=edit" method="POST" class="search_form general_form">
															<fieldset>
																<div class="forms">
																	<div class="row">
																		<label>Nome:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome do estabelecimento não pode ficar em branco." /><input name="id_estabelecimento" value="<?=$arr[$i]->id_estabelecimento['id_estabelecimento']?>" type="hidden" /></span>
																			<span class="system negative"></span>
																		</div>
																	</div>
																	<div class="row">
																		<label>Cnpj:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="cnpj" id="cnpj" value="<?=$arr[$i]->cnpj['cnpj']?>" type="text" title="O nome do estabelecimento não pode ficar em branco." /><input name="id_estabelecimento" value="<?=$arr[$i]->id_estabelecimento['id_estabelecimento']?>" type="hidden" /></span>
																			<span class="system negative"></span>
																		</div>
																	</div>																	
																	<div class="row">
																		<label>Email:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="email" id="email" value="<?=$arr[$i]->email['email']?>" type="text" title="Não está me parecendo um email." /></span>
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
														<form id="clienteConfig" action="vi_cliente.php?action=config" method="POST" class="search_form general_form">
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
											<? include('includes/alerta.php') ?>
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
					<?php
					if(isset($_REQUEST['ed'])){
					?>
					<div class="quick_info">
						<div class="quick_info_top">
							<h2>Logo cliente</h2>
						</div>
						<div class="quick_info_content">
							<?php
								$c = new Control();
								$arr = $c->Controle_cliente($_GET['ed']);
								for ($i = 0; $i < count($arr); $i++){
							?>
								<table align="center">
									<tr>
										<td>
											<a class="inline" href="#<?=$arr[$i]->idcliente['idcliente']?>" title="Alterar"><img src="<?=$arr[$i]->logo['logo']?>" alt="" width="160px" /></a>
											<div style='display:none'>
												<div id='<?=$arr[$i]->idcliente['idcliente']?>' style='padding:10px; background:#fff;'>
													<form id="" action="vi_cliente.php?action=img" method="POST" enctype="multipart/form-data" class="search_form general_form">
														<div class="forms">
															<div class="row">
																<label>Logo:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input type="hidden" value="<?=$arr[$i]->idcliente['idcliente']?>" name="idcliente" />
																		<input name="logo" id="logomarca" type="file" />
																	</span>
																</div>
															</div>
															<div class="buttons">
																<ul>
																	<li><span class="button send_form_btn"><span><span>Atualizar</span></span><input name="" type="submit" /></span></li>
																</ul>
															</div>
														</div>
													</form>
												</div>
											</div>
										</td>
									</tr>
								</table>
							<?php
								}
							?>
						</div>
						<span class="quick_info_bottom"></span>
					</div>
				<?php
				}
				?>
				</div>			
				<br>
				<div class="inner">
					<!--[if !IE]>start section<![endif]-->	
					<div class="quick_info">
						<div class="quick_info_top">
							<h2>Quick info</h2>
						</div>
						<?php
							$c = new Control();
							$arr = $c->Controle_cliente($_GET['ed']);
							for ($i = 0; $i < count($arr); $i++){
						?>						
						<div class="quick_info_content">
							<dl>
								<dt>Nome:</dt>
								<dd><?=$arr[$i]->nome['nome']?></dd>
							</dl>
							<dl>
								<dt>Cnpj:</dt>
								<dd><?=$arr[$i]->cnpj['cnpj']?></dd>
							</dl>
							<dl>
								<dt>Email:</dt>
								<dd><?=$arr[$i]->email['email']?></dd>
							</dl>
							<dl>
								<dt>Endereço:</dt>
								<dd><?=$arr[$i]->endereco['endereco']?></dd>
							</dl>
							<dl>
								<dt>Complemento:</dt>
								<dd><?=$arr[$i]->complemento['complemento']?></dd>
							</dl>							
							<dl>
								<dt>Bairro:</dt>
								<dd><?=$arr[$i]->bairro['bairro']?></dd>
							</dl>											
							<dl>
								<dt>Cidade:</dt>
								<dd>
								<?php
									$c = new Control();
									$arre = $c->Controle_cidades($arr[$i]->cidade['cidade']);
									for ($j = 0; $j < count($arre); $j++){
										print $arre[$j]->cidade['cidade'] . "," . $arre[$j]->estado['estado'];
									}
								?>																
								</dd>
							</dl>										
							<dl>
								<dt>Cep:</dt>
								<dd><?=$arr[$i]->cep['cep']?></dd>
							</dl>
							<dl>
								<dt>Tel:</dt>
								<dd><?=$arr[$i]->telefone['telefone']?></dd>
							</dl>							
							<dl>
								<dt>Site:</dt>
								<dd><?=$arr[$i]->site['site']?></dd>
							</dl>														
						</div>
						<?php
							}
						?>						
						<span class="quick_info_bottom"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>


</body>
</html>