<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "in":
				$cad = new Control();
				$cad->cadMaterial($_POST["nome"], $_FILES["endereco"], $_POST["descricao"], $_POST["aula_idaula"], $_POST["cliente_idcliente"], $_POST["folder"]);
			break;
			case "edit":
				$cad = new Control();
				$cad->editMaterial($_POST["idmaterial"], $_POST["nome"], $_POST["descricao"], $_POST["aula_idaula"], $_POST["cliente_idcliente"]);
			break;
			case "out":
				$cad = new Control();
				$cad->delMaterial($_REQUEST["nu"], $_REQUEST["ed"]);
			break;
			case "arq":
				$cad = new Control();
				$cad->Arquivo($_POST["idmaterial"], $_FILES["endereco"], $_POST["cliente_idcliente"], $_POST['folder']);
			break;			
		}
	}
	
	$c = new Control();
	$arr = $c->Controle_cliente($_GET['ed']);
	for ($i = 0; $i < count($arr); $i++){		
		define("FOLDER",$arr[$i]->folder['folder']);	
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
							<h2>Apostilas e materiais</h2>

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
													$arr = $c->Controle_material($_GET['nu'], $_GET['ed']);
													for ($i = 0; $i < count($arr); $i++){
											?>
												<h3>Editar material: <?=$arr[$i]->nome['nome']?></h3>

												<form id="Material" action="material.php?action=edit" method="POST" class="search_form general_form" enctype="multipart/form-data">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome não pode ficar em branco." />
																		<input name="idmaterial" id="idmaterial" value="<?=$arr[$i]->idmaterial['idmaterial']?>" type="hidden" />
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
																<label>Aulas:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="aula_idaula" id="aula_idaula" title="">
																			<option selected value="">---</option>
																			<?php
																				$c = new Control();
																				$arre = $c->Controle_aula($idi = null, $_GET['ed']);
																				for ($j = 0; $j < count($arre); $j++){
																			?>
																			<option value="<?php print $arre[$j]->idaula['idaula']; ?>" <?php if($arre[$j]->idaula['idaula'] == $arr[$i]->aula_idaula['aula_idaula']){ echo "selected"; }?>><?php print $arre[$j]->nome['nome']; ?></option>
																			<?php
																				}
																			?>
																		</select>
																	</span>
																	<span class="system negative"></span>
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
											<?php
													}
												}else{
											?>
												<h3>Cadastrar nova apostila/material</h3>

												<form id="Material" action="material.php?action=in" method="POST" class="search_form general_form" enctype="multipart/form-data">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" type="text" title="O nome não pode ficar em branco." />
																		<input name="cliente_idcliente" id="cliente_idcliente" value="<?=$_GET['ed']?>" type="hidden" />
																		<input name="folder" value="<?=FOLDER?>" type="hidden" />
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Arquivo:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="endereco" id="endereco" type="file" title="Faça o upload do arquivo." /></span>
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
																<label>Aula:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="aula_idaula" id="aula_idaula" title="Escolha uma aula para este vídeo">
																			<option selected value="">---</option>
																			<?php
																				$c = new Control();
																				$arre = $c->Controle_aula($idi = null, $_GET['ed']);
																				for ($j = 0; $j < count($arre); $j++){
																			?>
																			<option value="<?php print $arre[$j]->idaula['idaula']; ?>"><?php print $arre[$j]->nome['nome']; ?></option>
																			<?php
																				}
																			?>
																		</select>
																	</span>
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
							<h2>Materiais cadastrados</h2>
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
																	<th><a href="#">Arquivo</a></th>
																	<th><a href="#">Aula</a></th>
																	<th style="width: 96px;">A&ccedil;ões</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	define('TABLE1', 'first');
																	define('TABLE2', 'second');
																	$c = new Control();
																	$arr = $c->Controle_material($id = null, $_GET['ed']);
																	for ($i = 0; $i < count($arr); $i++){

																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td>#<?=$arr[$i]->idmaterial['idmaterial']?></td>
																    <td><?=$arr[$i]->nome['nome']?></td>
																	<td><?=$arr[$i]->endereco['endereco']?></td>
																	<td><?=$arr[$i]->aulaNome['aulaNome']?></td>
																	<td>
																		<div class="actions">
																			<ul>
																				<li><a class="action2" href="material.php?nu=<?=$arr[$i]->idmaterial['idmaterial']?>&ed=<?=$_GET['ed']?>">2</a></li>
																				<li><a class="action4" href="material.php?action=out&nu=<?=$arr[$i]->idmaterial['idmaterial']?>&ed=<?=$_GET['ed']?>" onClick="return confirm('Deletar o material <?php print $arr[$i]->nome['nome']; ?>?')">4</a></li>
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
																	<th><a href="#">Arquivo</a></th>
																	<th><a href="#">Aula</a></th>
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
					if(isset($_GET['nu'])){
					$c = new Control();
					$arr = $c->Controle_material($_GET['nu'], $_GET['ed']);
					for ($i = 0; $i < count($arr); $i++){
				?>				
					<div class="quick_info">
						<div class="quick_info_top">
							<h2>Dados do arquivo</h2>
						</div>
						<div class="quick_info_content">
							<dl>
								<dt>Nome:</dt>
								<dd><?=$arr[$i]->endereco['endereco']?></dd>
							</dl>
							<dl>
								<dt>Tipo do arquivo:</dt>
								<dd>
								<?
									list($nome_arquivo, $extensao_arquivo) = explode(".", $arr[$i]->endereco['endereco']);
									echo $extensao_arquivo;
								?>
								</dd>
							</dl>							
							<dl>
								<dt>Filesize:</dt>
								<dd><?=filesize("../../material/" . FOLDER . "/" . $arr[$i]->endereco['endereco'])?> Bytes</dd>
							</dl>
							<dl>
								<dt><a class='inline' href="#arquivo">Alterar</a></dt>
								<dd><a class='inline' href="#pdf">Visualizar</a></dd>
							</dl>
						</div>
						<span class="quick_info_bottom"></span>
					</div>
					<div style='display:none'>
						<div id='arquivo' style='padding:10px; background:#fff;'>
							<h3>Upload do arquivo</h3>
							<form id="arquivo_muda" action="material.php?action=arq" method="POST" class="search_form general_form" enctype="multipart/form-data">
								<fieldset>
									<div class="forms">
										<div class="row">
											<label>Arquivo:</label>
											<div class="inputs">
												<span class="input_wrapper">
													<input name="idmaterial" value="<?=$arr[$i]->idmaterial['idmaterial']?>" type="hidden" />
													<input name="cliente_idcliente" value="<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>" type="hidden" />
													<input name="folder" value="<?=FOLDER?>" type="hidden" />
													<input class="text" name="endereco" id="endereco" type="file" title="Faça o upload do arquivo." /></span>
												<span class="system negative"></span>
											</div>
										</div>
										<div class="row">
											<div class="buttons">
												<ul>
													<li><span class="button send_form_btn"><span><span>Alterar</span></span><input name="" type="submit" /></span></li>
												</ul>
											</div>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
					<div style='display:none'>
						<div id='pdf' style='padding:10px; background:#fff;'>
							<h3>PDF</h3>
							<?php
								$file = "../../material/" . FOLDER . "/" . $arr[$i]->endereco['endereco'];
							?>
							<iframe src="<?=$file?>" width="540px" height="500px"></iframe>
						</div>
					</div>											
				<?php
					}
				}
				?>	
				<br>
				<?php include('includes/menu.php'); ?>				
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>