<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "edit":
				$cad = new Control();
				$cad->editAula($_POST["idaula"], $_POST["nome"], $_POST["descricao"], $_POST["curso_idcurso"], $_POST["professor_idprofessor"]);
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
														if(isset($_GET['ed'])){
															$c = new Control();
															$arr = $c->Controle_aula($_GET['ed']);
															for ($i = 0; $i < count($arr); $i++){
													?>
													<h3>Editar aula: <?=$arr[$i]->nome['nome']?></h3>
	
													<form id="curso" action="vi_aula.php?action=edit" method="POST" class="search_form general_form" enctype="multipart/form-data">
														<fieldset>
															<div class="forms">
																<div class="row">
																	<label>Nome:</label>
																	<div class="inputs">
																		<span class="input_wrapper"><input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome da aula não pode ficar em branco." /><input name="idaula" id="idaula" value="<?=$arr[$i]->idaula['idaula']?>" type="hidden" /></span>
																		<span class="system negative"></span>
																	</div>
																</div>
																<div class="row">
																	<label>Endereço do link:</label>
																	<div class="inputs">
																		<span class="input_wrapper"><input class="text" name="endereco_video" id="endereco_video" disabled value="<?=$arr[$i]->endereco_video['endereco_video']?>" type="text" title="O endereço do link não pode ficar em branco." /></span>
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
																					$arre = $c->Controle_curso($idi);
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
																	<label>Parceiro:</label>
																	<div class="inputs">
																		<span class="input_wrapper blank">
																			<select name="professor_idprofessor" id="professor_idprofessor" title="">
																				<option selected value="">---</option>
																				<?php
																					$c = new Control();
																					$arre = $c->Controle_professor($idi);
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
																	<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264" data-setup="{}">
																		<source src="../../aulas/<?=$_SESSION['FolderCliente']."/".$arr[$i]->endereco_video['endereco_video']?>" type='video/flv' />
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
					<?php //include('includes/info_promocao.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>

</body>
</html>