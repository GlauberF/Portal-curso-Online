<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "in":
				$cad = new Control();
				$cad->cadCurso($_POST["nome"], $_POST["valor"], $_POST["descricao"], $_POST["concurso_idconcurso"], $_POST["professor_idprofessor"], $_POST["cliente_idcliente"], implode("-",array_reverse(explode("/",$_POST["date_in"]))), implode("-",array_reverse(explode("/",$_POST["date_out"]))), $_FILES["capa"], $_POST['adicional']);
			break;
			case "edit":
				$cad = new Control();
				$cad->editCurso($_POST["idcurso"], $_POST["nome"], $_POST["valor"], $_POST["descricao"], $_POST["concurso_idconcurso"], $_POST["professor_idprofessor"], $_POST["cliente_idcliente"], implode("-",array_reverse(explode("/",$_POST["date_in"]))), implode("-",array_reverse(explode("/",$_POST["date_out"]))), $_POST['adicional']);
			break;
			case "out":
				$cad = new Control();
				$cad->delCurso($_REQUEST["nu"], $_REQUEST["ed"]);
			break;
			case "img":
				$cad = new Control();
				$cad->editCapaCurso($_POST["id"], $_FILES["capa"], $_POST["cliente_idcliente"]);
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
						<li><a href="online_cliente.php?ed=<?=$_GET["ed"]?>" class="sm5">Voltar</a></li>						
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
							<h2>Disciplinas</h2>

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
													$arr = $c->Controle_curso($_GET['nu'], $_GET['ed']);
													for ($i = 0; $i < count($arr); $i++){
											?>
												<h3>Editar disciplina: <?=$arr[$i]->nome['nome']?></h3>

												<form id="Disciplina" action="curso.php?action=edit" method="POST" class="search_form general_form" enctype="multipart/form-data">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome do curso pode ficar em branco." />
																		<input name="idcurso" id="idcurso" value="<?=$arr[$i]->idcurso['idcurso']?>" type="hidden" />
																		<input name="cliente_idcliente" id="cliente_idcliente" value="<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>" type="hidden" />																		
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Valor:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="valor" id="valor" value="<?=$arr[$i]->valor['valor']?>" type="text" title="O valor não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Curso:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="concurso_idconcurso" id="concurso_idconcurso" title="">
																			<option selected value="">---</option>
																			<?php
																				$c = new Control();
																				$arre = $c->Controle_concurso($idi = null, $_GET['ed']);
																				for ($j = 0; $j < count($arre); $j++){
																			?>
																			<option value="<?php print $arre[$j]->idconcurso['idconcurso']; ?>" <?php if($arre[$j]->idconcurso['idconcurso'] == $arr[$i]->concurso_idconcurso['concurso_idconcurso']){ echo "selected"; }?>><?php print $arre[$j]->nome['nome']; ?></option>
																			<?php
																				}
																			?>
																		</select>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Parceiro:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="professor_idprofessor" id="professor_idprofessor" title="">
																			<option selected value="">---</option>
																			<?php
																				$c = new Control();
																				$arre = $c->Controle_professor($idi = null, $_GET['ed']);
																				for ($j = 0; $j < count($arre); $j++){
																			?>
																			<option value="<?php print $arre[$j]->idprofessor['idprofessor']; ?>" <?php if($arre[$j]->idprofessor['idprofessor'] == $arr[$i]->professor_idprofessor['professor_idprofessor']){ echo "selected"; }?>><?php print $arre[$j]->nome['nome']; ?></option>
																			<?php
																				}
																			?>
																		</select>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Data começo:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="date_in" id="date_in" type="text" value="<?=implode("/",array_reverse(explode("-",$arr[$i]->date_in['date_in'])));?>" title="O valor não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Data final:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="date_out" id="date_out" type="text" value="<?=implode("/",array_reverse(explode("-",$arr[$i]->date_out['date_out'])));?>" title="O valor não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Descrição:</label>
																<div class="inputs">
																	<span class="input_wrapper textarea_wrapper">
																		<textarea rows="" cols="" class="text" name="descricao" title="Você tem que escolher uma descrição."><?=$arr[$i]->descricao['descricao']?></textarea>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Informações adicionais:</label>
																<div class="inputs">
																	<span class="input_wrapper textarea_wrapper">
																		<textarea rows="" cols="" class="text" name="adicional"><?=$arr[$i]->adicional['adicional']?></textarea>
																	</span>
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
												<h3>Cadastrar nova disciplina</h3>

												<form id="Disciplina" action="curso.php?action=in" method="POST" class="search_form general_form" enctype="multipart/form-data">
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
																<label>Valor:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="valor" id="valor" type="text" title="O valor do curso não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Curso:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="concurso_idconcurso" id="concurso_idconcurso" title="Escolha um curso para esta disciplina">
																			<option selected value="">---</option>
																			<?php
																				$c = new Control();
																				$arre = $c->Controle_concurso($idi = null, $_GET['ed']);
																				for ($j = 0; $j < count($arre); $j++){
																			?>
																			<option value="<?php print $arre[$j]->idconcurso['idconcurso']; ?>"><?php print $arre[$j]->nome['nome']; ?></option>
																			<?php
																				}
																			?>
																		</select>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>															
															<div class="row">
																<label>Parceiro:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="professor_idprofessor" id="professor_idprofessor" title="">
																			<option selected value="">---</option>
																			<?php
																				$c = new Control();
																				$arre = $c->Controle_professor($idi = null, $_GET['ed']);
																				for ($j = 0; $j < count($arre); $j++){
																			?>
																			<option value="<?php print $arre[$j]->idprofessor['idprofessor']; ?>"><?php print $arre[$j]->nome['nome']; ?></option>
																			<?php
																				}
																			?>
																		</select>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Data começo:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="date_in" id="date_in" type="text" title="Escolha uma data." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Data final:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="date_out" id="date_out" type="text" title="Escolha uma data." /></span>
																	<span class="system negative"></span>
																</div>
															</div>																															
															<div class="row">
																<label>Descrição:</label>
																<div class="inputs">
																	<span class="input_wrapper textarea_wrapper">
																		<textarea rows="" cols="" class="text" name="descricao" title="Você tem que escrever uma descrição."></textarea>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Informações adicionais:</label>
																<div class="inputs">
																	<span class="input_wrapper textarea_wrapper">
																		<textarea rows="" cols="" class="text" name="adicional"></textarea>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>																																																												
															<div class="row">
																<label>Capa:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="capa" id="capa" type="file" title="Faça o upload do arquivo." /></span>
																	<span class="system negative">widht:270px & height: 200px</span>
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
											<? include('includes/alerta.php') ?>
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
							<h2>Disciplinas cadastradas</h2>
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
																	<th><a href="#" class="desc"></a></th>
																	<th><a href="#">Nome</a></th>
																	<th><a href="#">Concurso</a></th>
																	<th><a href="#">Valor</a></th>
																	<th><a href="#">Professor</a></th>																	
																	<th style="width: 96px;">A&ccedil;ões</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	define('TABLE1', 'first');
																	define('TABLE2', 'second');
																	$c = new Control();
																	$arr = $c->Controle_curso($id = null, $_GET['ed']);
																	for ($i = 0; $i < count($arr); $i++){

																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td>#<?=$arr[$i]->idcurso['idcurso']?></td>
																    <td><?=$arr[$i]->nome['nome']?></td>
																	<td><?=$arr[$i]->concursoNome['concursoNome']?></td>
																	<td><?=$arr[$i]->valor['valor']?></td>
																	<td><?=$arr[$i]->professorNome['professorNome']?></td>
																	<td>
																		<div class="actions">
																			<ul>
																				<li><a class="action2" href="curso.php?nu=<?=$arr[$i]->idcurso['idcurso']?>&ed=<?=$_GET['ed']?>">2</a></li>
																				<li><a class="action4" href="curso.php?action=out&nu=<?=$arr[$i]->idcurso['idcurso']?>&ed=<?=$_GET['ed']?>" onClick="return confirm('Deletar o curso <?php print $arr[$i]->nome['nome']; ?>?')">4</a></li>
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
																	<th><a href="#">Concurso</a></th>
																	<th><a href="#">Valor</a></th>
																	<th><a href="#">Professor</a></th>	
																	<th style="width: 96px;">A&ccedil;ões</th>
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
			<div id="sidebar">
				<div class="inner">
					<?php
					if(isset($_REQUEST['nu'])){
					?>
					<div class="quick_info">
						<div class="quick_info_top">
							<h2>Capa da disciplina</h2>
						</div>
						<div class="quick_info_content">
							<?php
								$c = new Control();
								$arr = $c->Controle_curso($_GET['nu'], $_GET['ed']);
								for ($i = 0; $i < count($arr); $i++){
							?>
								<table align="center">
									<tr>
										<td>
											<a class="inline" href="#<?=$arr[$i]->idcurso['idcurso']?>" title="Alterar"><img src="<?=$arr[$i]->capa['capa']?>" alt="" width="160px" /></a>
											<div style='display:none'>
												<div id='<?=$arr[$i]->idcurso['idcurso']?>' style='padding:10px; background:#fff;'>
													<form id="" action="curso.php?action=img" method="POST" enctype="multipart/form-data" class="search_form general_form">
														<div class="forms">
															<div class="row">
																<label>Capa:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input type="hidden" value="<?=$arr[$i]->idcurso['idcurso']?>" name="id" />
																		<input type="hidden" value="<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>" name="cliente_idcliente" />																		
																		<input name="capa" id="logomarca" type="file" />
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
					</br>					
					<?php include('includes/menu.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>

</body>
</html>