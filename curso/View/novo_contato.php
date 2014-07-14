<?php
	include('includes/auth.php');
	require('../Controller/controller.php');
	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "in":
				$cad = new Control();
				$cad->cadSend($_POST["assunto"], $_POST["id_estabelecimento_id"], $id_usuario_admin, $_POST["texto"]);
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
						<li><a href="financeiro.php"><span><span>Financeiro</span></span></a></li>						
					</ul>
				</div>
				<div id="sec_menu">
				</div>
			</div>
		</div>
		<div id="content">
			<div id="page">
				<div class="inner">
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Novo contato</h2>

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
													if($_GET['id']){
														$vi = $_GET['id'];
														$c = new Control();
														$arr = $c->Controle_contato($vi, $a, $b);
														for ($i = 0; $i < count($arr); $i++){

												?>

												<form id="Contato" action="novo_contato.php?action=edit" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Estabelecimento:</label>
															</div>
															<div class="row">
																<label>Assunto:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="assunto" id="assunto" value="<?=$arr[$i]->assunto['assunto']?>" type="text" title="O assunto não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Texto:</label>
																<div class="inputs">
																	<span class="input_wrapper textarea_wrapper">
																		<textarea rows="" cols="" class="text" name="descricao"><?=$arr[$i]->texto['texto']?></textarea>
																	</span>
																</div>
															</div>
															<div class="row">
																<div class="buttons">
																	<ul>
																		<li><span class="button send_form_btn"><span><span>Atualizar</span></span><input name="" type="submit" /></span></li>
																		<li><span class="button red_btn"><span><span>Cancelar</span></span><input type="button" id="botao_voltar" onclick="history.go(-1)" /></span></li>
																	</ul>
																</div>
															</div>
														</div>
													</fieldset>
												</form>
												<?php
														}
													}else{
												?>
												<form id="Contato" action="novo_contato.php?action=in" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Estabelecimento:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="id_estabelecimento_id" id="id_estabelecimento_id">
																			<option value="">Todos</option>
																			<?php
																				$c = new Control();
																				$arre = $c->Controle_estabelecimento($idi);
																				for ($j = 0; $j < count($arre); $j++){
																			?>
																			<option value="<?php print $arre[$j]->id_estabelecimento['id_estabelecimento']; ?>"><?php print $arre[$j]->nome_estabelecimento['nome_estabelecimento']; ?></option>
																			<?php
																				}
																			?>
																		</select>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Assunto:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="assunto" id="assunto" type="text" title="O assunto não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Texto:</label>
																<div class="inputs">
																	<span class="input_wrapper textarea_wrapper">
																		<textarea rows="" cols="" class="text" name="texto"></textarea>
																	</span>
																</div>
															</div>
															<div class="row">
																<div class="buttons">
																	<ul>
																		<li><span class="button send_form_btn"><span><span>Enviar</span></span><input name="" type="submit" /></span></li>
																	</ul>
																</div>
															</div>
														</div>
													</fieldset>
												</form>
												<?php
												    }
												?>
												<? include('includes/alerta.php') ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
						</div>
					</div>
					<!--[if !IE]>end section<![endif]-->
				</div>
			</div>
			<!--[if !IE]>end page<![endif]-->
			<!--[if !IE]>start sidebar<![endif]-->
			<div id="sidebar">
				<div class="inner">
					<?php //include('includes/quick.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>