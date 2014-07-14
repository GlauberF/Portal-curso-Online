<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "cad":
				$cad = new Control();
				$cad->cadVenda($_POST["nome"], $_POST["idcurso"], $_POST["valor"], $_FILES["capa"], $_POST["cliente_idcliente"], implode("-",array_reverse(explode("/",$_POST["date_in"]))), implode("-",array_reverse(explode("/",$_POST["date_out"]))), $_POST['descricao'], $_POST['adicional']);
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
						<li><a href="vendas.php?ed=<?=$_GET["ed"]?>" class="sm5">Voltar</a></li>						
					</ul>
				</div>
			</div>
		</div>
		<div id="content">
			<div id="page">
				<div class="inner">
					<div class="section">
						<? include('includes/alerta.php') ?>					
						<div class="title_wrapper">
							<h2>Cadastrar novo pacote de venda</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<div class="section_content">
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
												<form id="Vendas" action="cad_venda.php?action=cad" method="POST" class="search_form general_form" enctype="multipart/form-data">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" type="text" title="O nome não pode ficar em branco." />
																		<input name="cliente_idcliente" id="cliente_idcliente" type="hidden" value="<?=$_GET["ed"]?>" />																		
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Disciplinas:</label>
																<div class="inputs">
																	<span class="input_wrapper textarea_wrapper">
																		<ul id="sortable3" class="droptrue2">
																		
																		</ul>
																	</span>
																</div>
															</div>
															<div class="row">
																<label>Valor:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="valor" id="valor" type="text" title="O valor não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Data começo:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="date_in" id="date_in" type="text" title="Insira uma data de entrada." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Data final:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="date_out" id="date_out" type="text" title="Insira uma data de saída." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Descrição:</label>
																<div class="inputs">
																	<span class="input_wrapper textarea_wrapper">
																		<textarea rows="" cols="" class="text" name="descricao" title="Você tem que escolher uma descrição."></textarea>
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
					<!--[if !IE]>start section<![endif]-->	
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Disciplinas disponíveis</h2>
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
												<div style="padding:10px">
													<label style="font-size:16px">Curso:</label>
													<div class="inputs">
														<span class="input_wrapper blank">
															<select name="concurso_idconcurso" id="concurso_idconcurso" title="">
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
												<div id="escolha">			
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
					<!--[if !IE]>start section<![endif]-->	
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Lixeira</h2>
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
												<ul id="sortable2" class="droptrue3">
												</ul>
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
					<?php include('includes/menu.php'); ?>									
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
	<script type="text/javascript">
		$(function(){
			$('#concurso_idconcurso').change(function(){
				if( $(this).val() ) {
					$.getJSON('curso.ajax.php?search=',{concurso_idconcurso: $(this).val(), ajax: 'true'}, function(j){
						var options = '<ul id="sortable1" class="droptrue">';
						for (var i = 0; i < j.length; i++) {
							options += '<li class="ui-state-default" data-value="' + j[i].valor + '" data-nome="' + j[i].nome + '"><input type="hidden" name="idcurso[]" value="' + j[i].idcurso + '">' + j[i].nome + '</li>';
						}
						options += '</ul>';
						$('#escolha').html(options).show();
						$( "ul.droptrue" ).sortable({
							connectWith: "ul"
						});						
					});
				} else {
					$('#escolha').html();
				}
			});
		});
	</script>
</body>
</html>