<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "in":
				$cad = new Control();
				$cad->cadTema($_POST["nome"], $_FILES["capa"], $_FILES["zip"]);
			break;
			case "edit":
				$cad = new Control();
				$cad->editTema($_POST["id"], $_POST["nome"]);
			break;
			case "out":
				$cad = new Control();
				$cad->delTema($_REQUEST["nu"]);
			break;
			case "img":
				$cad = new Control();
				$cad->editCapaTema($_POST["id"], $_FILES["capa"]);
			break;
			case "zip":
				$cad = new Control();
				$cad->editZipTema($_POST["id"], $_FILES["zip"]);
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
						<li><a href="index.php" class="selected"><span><span>Home</span></span></a></li>
						<li><a href="online.php"><span><span>Curso-online</span></span></a></li>						
						<li><a href="simulado.php"><span><span>Simulado</span></span></a></li>					
					</ul>
				</div>
				<div id="sec_menu">
					<ul>
						<li><a href="index.php" class="sm5">Voltar</a></li>						
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
							<h2>Temas</h2>

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
													$arr = $c->Controle_tema($_GET['nu']);
													for ($i = 0; $i < count($arr); $i++){
											?>
												<h3>Editar tema: <?=$arr[$i]->nome['nome']?></h3>

												<form id="tema" action="tema.php?action=edit" method="POST" class="search_form general_form" enctype="multipart/form-data">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome do tema não pode ficar em branco." />
																		<input name="id" id="id" value="<?=$arr[$i]->id['id']?>" type="hidden" />																
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
												<h3>Cadastrar novo tema</h3>

												<form id="tema" action="tema.php?action=in" method="POST" class="search_form general_form" enctype="multipart/form-data">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" type="text" title="O nome do tema não pode ficar em branco." />															
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Arquivo:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="zip" id="zip" type="file" title="Faça o upload do arquivo." /></span>
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
							<h2>Temas cadastrados</h2>
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
																	<th><a href="#">Imagem</a></th>
																	<th><a href="#">Nome</a></th>
																	<th style="width: 96px;">A&ccedil;ões</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	define('TABLE1', 'first');
																	define('TABLE2', 'second');
																	$c = new Control();
																	$arr = $c->Controle_tema($id = null);
																	for ($i = 0; $i < count($arr); $i++){
																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td>#<?=$arr[$i]->id['id']?></td>
																    <td><img src="<?=$arr[$i]->capa['capa']?>" width="80px"></td>
																	<td><?=$arr[$i]->nome['nome']?></td>
																	<td>
																		<div class="actions">
																			<ul>
																				<li><a class="action2" href="tema.php?nu=<?=$arr[$i]->id['id']?>">2</a></li>
																				<li><a class="action4" href="tema.php?action=out&nu=<?=$arr[$i]->id['id']?>" onClick="return confirm('Deletar o tema <?php print $arr[$i]->nome['nome']; ?>?')">4</a></li>
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
																	<th><a href="#">Imagem</a></th>
																	<th><a href="#">Nome</a></th>
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
							<h2>Capa do tema</h2>
						</div>
						<div class="quick_info_content">
							<?php
								$c = new Control();
								$arr = $c->Controle_tema($_GET['nu']);
								for ($i = 0; $i < count($arr); $i++){
							?>
								<table align="center">
									<tr>
										<td>
											<a class="inline" href="#capa<?=$arr[$i]->id['id']?>" title="Alterar"><img src="<?=$arr[$i]->capa['capa']?>" alt="" width="160px" /></a>
											<div style='display:none'>
												<div id='capa<?=$arr[$i]->id['id']?>' style='padding:10px; background:#fff;'>
													<form id="" action="tema.php?action=img" method="POST" enctype="multipart/form-data" class="search_form general_form">
														<div class="forms">
															<div class="row">
																<label>Capa:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input type="hidden" value="<?=$arr[$i]->id['id']?>" name="id" />
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
					<?php
					if(isset($_REQUEST['nu'])){
					?>
					<div class="quick_info">
						<div class="quick_info_top">
							<h2>Arquivo do tema</h2>
						</div>
						<div class="quick_info_content">
							<?php
								$c = new Control();
								$arr = $c->Controle_tema($_GET['nu']);
								for ($i = 0; $i < count($arr); $i++){
							?>
								<table align="center">
									<tr>
										<td>
											<a class="inline" href="#zip<?=$arr[$i]->id['id']?>" title="Alterar"><img src="media/images/Zip-icon.png" alt="" width="160px" /></a>
											<div style='display:none'>
												<div id='zip<?=$arr[$i]->id['id']?>' style='padding:10px; background:#fff;'>
													<form id="" action="tema.php?action=zip" method="POST" enctype="multipart/form-data" class="search_form general_form">
														<div class="forms">
															<div class="row">
																<label>Arquivo:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input type="hidden" value="<?=$arr[$i]->id['id']?>" name="id" />
																		<input name="zip" id="logomarca" type="file" />
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
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>

</body>
</html>