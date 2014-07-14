<?php
	include('includes/auth.php');
	require('../Controller/controller.php');
	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "in":
				$cad = new Control();
				$cad->cVersao($_POST["atualizacao_numero"], $_POST["nome"], $_POST["descricao"]);
			break;
			case "out":
				$cad = new Control();
				$cad->dVersao($_GET["nu"]);
			break;
			case "edit":
				$cad = new Control();
				$cad->eVersao($_POST["id_controle_versao"], $_POST["atualizacao_numero"], $_POST["nome"], $_POST["descricao"]);
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
						<?php
						if(isset($_REQUEST['ed'])){
						?>	
						<li><a href="versao.php" class="sm5">Voltar</a></li>
						<?php
						}else{
						?>
						<li><a href="index.php" class="sm5">Voltar</a></li>						
						<?php
						}
						?>
					</ul>				
				</div>
			</div>
		</div>
		<div id="content">
			<div id="page">
				<div class="inner">
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<? include('includes/alerta.php') ?>
						<div class="title_wrapper">
							<h2>Controle de versão</h2>

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
													if(isset($_GET['ed'])){
														$c = new Control();
														$arr = $c->Dynamic_version($_GET['ed']);
														for ($i = 0; $i < count($arr); $i++){

												?>
												<h3>Editar atualização <?=$arr[$i]->atualizacao_numero['atualizacao_numero']?> - <?=$arr[$i]->nome['nome']?></h3>

												<form id="Versao" action="versao.php?action=edit" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Número atualização:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="atualizacao_numero" id="atualizacao_numero" value="<?=$arr[$i]->atualizacao_numero['atualizacao_numero']?>" type="text" title="O número da versão é importante." /></span>
																	<span class="system negative"></span>
																	<input class="text" name="id_controle_versao" id="id_tipo" value="<?=$arr[$i]->id['id']?>" type="hidden" />
																</div>
															</div>
															<div class="row">
																<label>Nome versão:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome da versão é importante." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Descrição:</label>
																<div class="inputs">
																	<span class="input_wrapper textarea_wrapper">
																		<textarea rows="" cols="" class="text" name="descricao"><?=$arr[$i]->descricao['descricao']?></textarea>
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
													<h3>Cadastrar versão</h3>

													<form id="Versao" action="versao.php?action=in" method="POST" class="search_form general_form">
														<fieldset>
															<div class="forms">
																<div class="row">
																	<label>Número atualização:</label>
																	<div class="inputs">
																		<span class="input_wrapper"><input class="text" name="atualizacao_numero" id="atualizacao_numero" type="text" title="O número da versão é importante." /></span>
																		<span class="system negative"></span>
																		<input class="text" name="id_controle_versao" id="id_tipo" type="hidden" />
																	</div>
																</div>
																<div class="row">
																	<label>Nome versão:</label>
																	<div class="inputs">
																		<span class="input_wrapper"><input class="text" name="nome" id="nome" type="text" title="O nome da versão é importante." /></span>
																		<span class="system negative"></span>
																	</div>
																</div>
																<div class="row">
																	<label>Descrição:</label>
																	<div class="inputs">
																		<span class="input_wrapper textarea_wrapper">
																			<textarea rows="" cols="" class="text" name="descricao"></textarea>
																		</span>
																	</div>
																</div>
																<div class="row">
																	<div class="buttons">
																		<ul>
																			<li><span class="button send_form_btn"><span><span>Cadastrar</span></span><input name="" type="submit" /></span></li>
																			<li><span class="button red_btn"><span><span>Cancelar</span></span><input type="button" id="botao_voltar" onclick="history.go(-1)" /></span></li>
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
							<span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
						</div>
					</div>
					<div class="section table_section">
						<div class="title_wrapper">
							<h2>Versões anteriores</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<div class="section_content">
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">

												<form action="#">
												<fieldset>
												<!--[if !IE]>start table_wrapper<![endif]-->
												<div class="table_wrapper">
													<div class="table_wrapper_inner">
														<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
															<thead>
																<tr>
																	<th><a href="#" class="asc">ID#</a></th>
																	<th><a href="#" class="desc">Nome</a></th>
																	<th><a href="#">Descrição</a></th>
																	<th style="width: 96px;">Ações</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	define('TABLE1', 'odd gradeX');
																	define('TABLE2', 'odd gradeA');
																	$c = new Control();
																	$arr = $c->Dynamic_version($id = null);
																	for ($i = 0; $i < count($arr); $i++){

																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td><?=$arr[$i]->atualizacao_numero['atualizacao_numero']?></td>
																	<td><?=$arr[$i]->nome['nome']?></td>
																	<td><?=$arr[$i]->descricao['descricao']?></td>
																	<td>
																		<div class="actions">
																			<ul>
																				<li><a class="action2" href="versao.php?ed=<?=$arr[$i]->id['id']?>">2</a></li>
																				<li><a class="action4" href="versao.php?action=out&nu=<?=$arr[$i]->id['id']?>" onClick="return confirm('Deletar a versão: <?=$arr[$i]->atualizacao_numero['atualizacao_numero'] ?> - <?=$arr[$i]->nome['nome'] ?>?')">4</a></li>
																			</ul>
																		</div>
																	</td>
																</tr>
																<?php
																	}
																?>
															</tbody>
															<tfoot>
																<tr>
																	<th><a href="#" class="asc">ID#</a></th>
																	<th><a href="#" class="desc">Nome</a></th>
																	<th><a href="#">Descrição</a></th>
																	<th style="width: 96px;">Ações</th>
																</tr>
															</tfoot>
														</table>
													</div>
												</div>
												<div class="table_menu">
												</div>
												<!--[if !IE]>end table menu<![endif]-->


												</fieldset>
												</form>


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
					<?php //include('includes/quick.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>