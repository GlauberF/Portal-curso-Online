<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "cad":
				$cad = new Control();
				$cad->cadProfessor($_POST["nome"], $_POST["email"], $_POST["tel"], $_POST["cel"], $_POST["cpf"], $_POST['cliente_idcliente'], $_POST["comissao"]);
			break;
			case "edit":
				$cad = new Control();
				$cad->editProfessor($_POST["idprofessor"], $_POST["nome"], $_POST["email"], $_POST["tel"], $_POST["cel"], $_POST["cpf"], $_POST["comissao"], $_POST['cliente_idcliente']);
			break;
			case "out":
				$cad = new Control();
				$cad->delProfessor($_REQUEST["nu"]);
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
							<h2>Parceiros</h2>

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
													$arr = $c->Controle_professor($_GET['nu'], $_GET['ed']);
													for ($i = 0; $i < count($arr); $i++){
											?>
												<h3>Editar parceiro: <?=$arr[$i]->nome['nome']?></h3>

												<form id="Professor" action="parceiro.php?action=edit" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" value="<?=$arr[$i]->nome['nome']?>" type="text" title="O nome do parceiro não pode ficar em branco." />
																		<input name="idprofessor" id="idprofessor" value="<?=$arr[$i]->idprofessor['idprofessor']?>" type="hidden" />
																		<input name="cliente_idcliente" id="cliente_idcliente" value="<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>" type="hidden" />																		
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Email:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="email" id="email" value="<?=$arr[$i]->email['email']?>" type="text" title="O email não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Tel:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="tel" id="tel" value="<?=$arr[$i]->tel['tel']?>" type="text" title="O telefone não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>															
															<div class="row">
																<label>Cel:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="cel" id="cel" value="<?=$arr[$i]->cel['cel']?>" type="text" title="O celular não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>																
															<div class="row">
																<label>CPF:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="cpf" id="cpf" value="<?=$arr[$i]->cpf['cpf']?>" type="text" title="O cpf não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Comissão:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="comissao" id="comissao" value="<?=$arr[$i]->comissao['comissao']?>" type="text" /></span>
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
												<h3>Cadastrar novo parceiro</h3>

												<form id="Professor" action="parceiro.php?action=cad" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="nome" id="nome" type="text" title="O nome do parceiro não pode ficar em branco." />
																	<input name="cliente_idcliente" id="cliente_idcliente" value="<?=$_GET['ed']?>" type="hidden" /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Email:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="email" id="email" type="text" title="O email não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Tel:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="tel" id="tel" type="text" title="O telefone não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>															
															<div class="row">
																<label>Cel:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="cel" id="cel" type="text" title="O celular não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>																
															<div class="row">
																<label>CPF:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="cpf" id="cpf" type="text" title="O cpf não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Comissão:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="comissao" id="comissao" type="text" /></span>
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
							<h2>Parceiros cadastrados</h2>
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
																	<th><a href="#">Email</a></th>
																	<th><a href="#">Tel</a></th>
																	<th><a href="#">Comissão</a></th>																	
																	<th style="width: 96px;">A&ccedil;ões</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	define('TABLE1', 'first');
																	define('TABLE2', 'second');
																	$c = new Control();
																	$arr = $c->Controle_professor($id = null, $_GET['ed']);
																	for ($i = 0; $i < count($arr); $i++){

																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td>#<?=$arr[$i]->idprofessor['idprofessor']?></td>
																    <td><?=$arr[$i]->nome['nome']?></td>
																	<td><?=$arr[$i]->email['email']?></td>
																	<td><?=$arr[$i]->tel['tel']?></td>
																	<td><?=$arr[$i]->comissao['comissao']?></td>																	
																	<td>
																		<div class="actions">
																			<ul>
																				<li><a class="action2" href="parceiro.php?nu=<?=$arr[$i]->idprofessor['idprofessor']?>&ed=<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>">2</a></li>
																				<li><a class="action4" href="parceiro.php?action=out&nu=<?=$arr[$i]->idprofessor['idprofessor']?>&ed=<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>" onClick="return confirm('Deletar o parceiro <?php print $arr[$i]->nome['nome']; ?>?')">4</a></li>
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
																	<th><a href="#">Email</a></th>
																	<th><a href="#">Tel</a></th>
																	<th><a href="#">Comissão</a></th>	
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
					<?php include('includes/menu.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>

</body>
</html>