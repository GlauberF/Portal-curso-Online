<?php
	include('includes/auth.php');
	require('../Controller/controller.php');
	
	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "in":
				$cad = new Control();
				$cad->cadUser($_POST["nome"], $_POST["senha2"], $_POST["email"], $_POST["status"]);
			break;
			case "out":
				$cad = new Control();
				$cad->delUser($_GET["nu"]);
			break;
			case "edit":
				$cad = new Control();
				$cad->editUser($_POST["id"], $_POST["nome"], $_POST["email"], $_POST["status"]);
			break;
			case "edit_senha":
				$cad = new Control();
				$cad->passUser($_POST["id"], $_POST["senha"]);
			break;
		}
	}
?>
<?php	include('includes/head.php'); ?>
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
						if(isset($_REQUEST['nu'])){
						?>	
						<li><a href="user.php" class="sm5">Voltar</a></li>
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
						<div class="title_wrapper">
							<h2>Usuários</h2>

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
													$arr = $c->Controle_user($_GET['nu']);
													for ($i = 0; $i < count($arr); $i++){

												?>
												<h3>Usuário do sistema: <?=$arr[$i]->nome['nome']?></h3>

												<form id="VI_User" action="user.php?action=edit" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome Completo:</label>
																<div class="inputs">
																	<input name="id" id="id" type="hidden" value="<?=$arr[$i]->id['id']?>" />
																	<span class="input_wrapper"><input class="text" name="nome" id="nome" type="text" value="<?=$arr[$i]->nome['nome']?>" title="Verifique o nome" /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>E-mail:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" id="email" name="email" type="text" value="<?=$arr[$i]->email['email']?>" title="O email está incorreto. Verifique." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">	
																<label>Ativo:</label>														
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="status" id="status">
																			<option value="1" <?=$arr[$i]->status['status']?'selected':''?>>Sim</option>
																			<option value="0" <?=!$arr[$i]->status['status']?'selected':''?>>Não</option>
																		</select>
																	</span>
																	<span class="system negative"></span>
																</div>		
															</div>																
															<div class="row">
																<div class="buttons">
																	<ul>
																		<li><span class="button send_form_btn"><span><span>Atualizar</span></span><input name="" type="submit" /></span></li>
																		<li><span class="button send_form_btn"><a class="inline" href="#inline_content" style="color: white;"><span><span>Alterar senha</span></span></a></span></li>
																	</ul>
																</div>
															</div>
														</div>
													</fieldset>
												</form>
												<div style='display:none'>
													<div id='inline_content' style='padding:10px; background:#fff;'>
														<form id="User_SENHA" action="user.php?action=edit_senha" method="POST" class="search_form general_form">
															<fieldset>
																<div class="forms">
																	<div class="row">
																		<label>Senha:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="senha" id="senha" class="password_test" onkeyup="passwordStrength(this.value)" type="password" title="Verifique a senha" /></span>
																			<span class="system negative"></span>
																		</div>
																	</div>
																	<div class="row">
																		<p>
																			<label for="passwordStrength">Password strength</label>
																			<div id="passwordDescription">Password not entered</div>
																			<div id="passwordStrength" class="strength0"></div>
																		</p>
																	</div>
																	<div class="row">
																		<label>Repita a senha:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input name="id" value="<?=$arr[$i]->id['id']?>" type="hidden" /><input class="text" name="senha1" id="senha1" type="password" title="As senhas tem que ser iguais." /></span>
																			<span class="system negative"></span>
																		</div>
																	</div>
																	<div class="row">
																		<div class="buttons">
																			<ul>
																				<li><span class="button send_form_btn"><span><span>Editar</span></span><input name="" type="submit" /></span></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</fieldset>
														</form>
													</div>
												</div>
												<?php
													}
													}else{
												?>
												<h3>Cadastrar novo usuário do sistema</h3>

												<form id="User" action="user.php?action=in" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome Completo:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="nome" id="nome" type="text" title="Verifique o nome" /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>E-mail:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" id="email" name="email" type="text" title="O email está incorreto. Verifique." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Senha:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" id="senha2" name="senha2" type="password" onkeyup="passwordStrength(this.value)" title="Senha inválida. Tente uma nova senha." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<p>
																	<label for="passwordStrength">Password strength</label>
																	<div id="passwordDescription">Password not entered</div>
																	<div id="passwordStrength" class="strength0"></div>
																</p>
															</div>
															<div class="row">
																<label>Repita a senha:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" id="senha3" name="senha3" type="password" title="As senhas devem ser iguais." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">	
																<label>Ativo:</label>														
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="status" id="status">
																			<option value="" selected>---</option>
																			<option value="1">Sim</option>
																			<option value="0">Não</option>
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
												<?php include('includes/alerta.php'); ?>
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
							<h2>Usuários cadastrados</h2>
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
																	<th><a href="#" class="desc">Nome completo</a></th>
																	<th><a href="#">Email</a></th>
																	<th style="width: 96px;">A&ccedil;ões</th>
																</tr>
															</thead>
															<tbody>
																<?php
																define('TABLE1', 'odd gradeA');
																define('TABLE2', 'odd gradeB');
																$c = new Control();
																$arr = $c->Controle_user($id = null);
																for ($i = 0; $i < count($arr); $i++){

																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td><?=$arr[$i]->id['id']?></td>
																	<td><?=$arr[$i]->nome['nome']?></td>
																	<td class="center"><?=$arr[$i]->email['email']?></td>
																	<td class="actions">
																		<ul>
																			<li><a class="action2" href="user.php?nu=<?=$arr[$i]->id['id']?>">2</a></li>
																			<li><a class="action4" href="user.php?action=out&nu=<?=$arr[$i]->id['id']?>" onClick="return confirm('Deletar o usuário <?=$arr[$i]->nome['nome']; ?> ?')">4</a></li>
																		</ul>
																	</td>
																</tr>
																<?php
																}
																?>
															</tbody>
															<tfoot>
																<tr>
																	<th><a href="#" class="asc">ID#</a></th>
																	<th><a href="#" class="desc">Nome completo</a></th>
																	<th><a href="#">Email</a></th>
																	<th style="width: 96px;">A&ccedil;ões</th>
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
					<?php //include('includes/info_user.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>