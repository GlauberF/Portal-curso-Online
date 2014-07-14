<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "edit":
				$cad = new Control();
				$cad->editAula($_POST["idaula"], $_POST["nome"], $_POST["endereco_video"], $_POST["descricao"], $_POST["curso_idcurso"], $_POST["cliente_idcliente"]);
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
						<li><a href="aula.php?ed=<?=$_GET["ed"]?>" class="sm5">Voltar</a></li>					
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
							<h2>Aulas</h2>

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
												    	<li><a href="#tabs-1">Editar</a></li>
												    	<li><a href="#tabs-2">Vídeo</a></li>
												  	</ul>
												  	<div id="tabs-1">											
													<?php
														if(isset($_GET['nu'])){
															$c = new Control();
															$arr = $c->Controle_aula($_GET['nu'], $_GET['ed']);
															for ($i = 0; $i < count($arr); $i++){
													?>
													<h3>Editar aula: <?=$arr[$i]->nome['nome']?></h3>
	
													<form id="Aula" action="vi_aula.php?action=edit" method="POST" class="search_form general_form" enctype="multipart/form-data">
														<fieldset>
															<div class="forms">
																<div class="row">
																	<label>Nome:</label>
																	<div class="inputs">
																		<span class="input_wrapper">
																			<input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome da aula não pode ficar em branco." />
																			<input name="idaula" id="idaula" value="<?=$arr[$i]->idaula['idaula']?>" type="hidden" />
																			<input name="cliente_idcliente" id="cliente_idcliente" value="<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>" type="hidden" />																			
																		</span>
																		<span class="system negative"></span>
																	</div>
																</div>
																<div class="row">
																	<label>Endereço do link:</label>
																	<div class="inputs">
																		<span class="input_wrapper"><input class="text" name="endereco_video" id="endereco_video" value="<?=$arr[$i]->endereco_video['endereco_video']?>" type="text" title="O endereço do link não pode ficar em branco." /></span>
																		<span class="system negative"></span>
																	</div>
																</div>		
																<div class="row">
																	<label>Descrição:</label>
																	<div class="inputs">
																		<span class="input_wrapper textarea_wrapper">
																			<textarea rows="" cols="" class="text" name="descricao" title="Você tem que escrever uma descrição."><?=$arr[$i]->descricao['descricao']?></textarea>
																		</span>
																		<span class="system negative"></span>
																	</div>
																</div>	
																<div class="row">
																	<label>Disciplina:</label>
																	<div class="inputs">
																		<span class="input_wrapper blank">
																			<select name="curso_idcurso" id="curso_idcurso" title="">
																				<option selected value="">---</option>
																				<?php
																					$c = new Control();
																					$arre = $c->Controle_curso($idi = null, $_GET["ed"]);
																					for ($j = 0; $j < count($arre); $j++){
																				?>
																				<option value="<?php print $arre[$j]->idcurso['idcurso']; ?>" <?php if($arre[$j]->idcurso['idcurso'] == $arr[$i]->curso_idcurso['curso_idcurso']){ echo "selected"; }?>><?php print $arre[$j]->nome['nome']; ?></option>
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
													</div>
													<div id="tabs-2">
														<table align="center">
															<tr>
																<td>
																	<video id="example_video_1" class="video-js vjs-default-skin" controls 
																	preload="auto" width="640" height="264" data-setup="{}">
																		<source src="../../aulas/novocurso/opa.php" type="video/mp4">
																	</video>													
																</td>
															</tr>
														</table>			
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
							</div>
							<span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
						</div>
					</div>
				</div>
			</div>
			<div id="sidebar">
				<div class="inner">
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Vídeos disponíveis</h2>
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
												<div class="example">
													<div id="fileTreeDemo_1" class="demo"></div>
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
					<?php include('includes/menu.php'); ?>					
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>

</body>
</html>