<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "in":
				$cad = new Control();
				$cad->cadConcurso($_POST["nome"], $_POST["descricao"], str_replace(",", "", $_POST["remuneracao"]), $_POST["vagas"], $_POST['cliente_idcliente']);
			break;
			case "edit":
				$cad = new Control();
				$cad->editConcurso($_POST["idconcurso"], $_POST["nome"], $_POST["descricao"], str_replace(",", "", $_POST["remuneracao"]), $_POST["vagas"], $_POST['cliente_idcliente']);
			break;
			case "out":
				$cad = new Control();
				$cad->delConcurso($_REQUEST["nu"], $_REQUEST["ed"]);
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
					<? 
						if(isset($_GET['nu'])){
					?>		
						<li><a href="concurso.php?ed=<?=$_GET["ed"]?>" class="sm5">Voltar</a></li>					
					<? 
						}else{
					?>								
						<li><a href="online_cliente.php?ed=<?=$_GET["ed"]?>" class="sm5">Voltar</a></li>										
					<? 
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
						<? include('includes/alerta.php') ?>
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Cursos</h2>

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
													$arr = $c->Controle_concurso($_GET['nu'], $_GET['ed']);
													for ($i = 0; $i < count($arr); $i++){
											?>
												<h3>Editar curso: <?=$arr[$i]->nome['nome']?></h3>

												<form id="Curso" action="concurso.php?action=edit" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome não pode ficar em branco." />
																		<input name="idconcurso" id="idconcurso" value="<?=$arr[$i]->idconcurso['idconcurso']?>" type="hidden" />
																		<input name="cliente_idcliente" id="cliente_idcliente" value="<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>" type="hidden" />
																	</span>
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
																<label>Remuneração:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="remuneracao" id="remuneracao" value="<?=$arr[$i]->remuneracao['remuneracao']?>" type="text" title="A remuneração não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Vagas:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="vagas" id="vagas" type="text" value="<?=$arr[$i]->vagas['vagas']?>" title="A vaga não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<div class="buttons">
																	<ul>
																		<li><span class="button send_form_btn"><span><span>Atualizar</span></span><input name="" type="submit" /></span></li>
																		<li><span class="button cancel_btn"><span><span>Limpar</span></span><input name="" type="reset" /></span></li>
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
												<h3>Cadastrar novo curso</h3>

												<form id="Curso" action="concurso.php?action=in" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" type="text" title="O nome não pode ficar em branco." />
																		<input name="cliente_idcliente" id="cliente_idcliente" value="<?=$_GET['ed']?>" type="hidden" />
																	</span>
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
																<label>Remuneração:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="remuneracao" id="remuneracao" type="text" title="A remuneração não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Vagas:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="vagas" id="vagas" type="text" title="A vaga não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<div class="buttons">
																	<ul>
																		<li><span class="button send_form_btn"><span><span>Cadastrar</span></span><input name="" type="submit" /></span></li>
																		<li><span class="button cancel_btn"><span><span>Limpar</span></span><input name="" type="reset" /></span></li>
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
							<h2>Cursos cadastrados</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<div class="section_content">
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
												<!--[if !IE]>start table_wrapper<![endif]-->
												<div class="table_wrapper">
													<div class="table_wrapper_inner">
														<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
															<thead>
																<tr>
																	<th><a href="#" class="desc"></a></th>
																	<th><a href="#">Nome</a></th>
																	<th><a href="#">Remuneração</a></th>
																	<th><a href="#">Vagas</a></th>
																	<th style="width: 96px;">A&ccedil;ões</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	define('TABLE1', 'first');
																	define('TABLE2', 'second');
																	$c = new Control();
																	$arr = $c->Controle_concurso($id = null, $_GET['ed']);
																	for ($i = 0; $i < count($arr); $i++){

																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td>#<?=$arr[$i]->idconcurso['idconcurso']?></td>
																    <td><?=$arr[$i]->nome['nome']?></td>
																	<td><?=$arr[$i]->remuneracao['remuneracao']?></td>
																	<td><?=$arr[$i]->vagas['vagas']?></td>
																	<td>
																		<div class="actions">
																			<ul>
																				<li><a class="action2" href="concurso.php?nu=<?=$arr[$i]->idconcurso['idconcurso']?>&ed=<?=$_GET['ed']?>">2</a></li>
																				<li><a class="action4" href="concurso.php?action=out&nu=<?=$arr[$i]->idconcurso['idconcurso']?>&ed=<?=$_GET['ed']?>" onClick="return confirm('Deletar o concurso <?php print $arr[$i]->nome['nome']; ?>?')">4</a></li>
																			</ul>
																		</div>
																	</td>
																</tr>
																<?php
																	}
																?>
															</tbody>
															<tfoot>
																	<th><a href="#" class="desc"></a></th>
																	<th><a href="#">Nome</a></th>
																	<th><a href="#">Remuneração</a></th>
																	<th><a href="#">Vagas</a></th>
																	<th style="width: 96px;">A&ccedil;ões</th>
															</tfoot>
														</table>
													</div>
												</div>
												<div class="table_menu">
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
			<div id="sidebar">
				<div class="inner">
					<?php include('includes/menu.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>

</body>
</html>