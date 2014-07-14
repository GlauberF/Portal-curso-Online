<?php
	include('includes/auth.php');
	require('../Controller/controller.php');
	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "edit":
				$cad = new Control();
				$cad->edit_Configuracao($_POST["id_configuracao"], $_POST["email_send"], $_POST["email_newsletter"], $_POST["endereco_smtp"], implode("-",array_reverse(explode("/",$_POST["date_bd_backup"]))), implode("-",array_reverse(explode("/",$_POST["date_file_backup"]))), $_POST["senha_smtp"]);
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
						<li><a href="financeiro.php"><span><span>Financeiro</span></span></a></li>						
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
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Configurações do sistema</h2>

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
													$c = new Control();
													$arr = $c->Controle_configuracao($_GET['ed']);
													for ($i = 0; $i < count($arr); $i++){
												?>
												<form id="Configuracao" action="config.php?action=edit" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label style="width:245px">Email para envio de senhas e alertas:</label>
																<br />
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="email_send" id="email_send" value="<?=$arr[$i]->email_send['email_send']?>" type="text" /></span>
																	<span class="system negative"></span>
																	<input class="text" name="id_configuracao" id="id_configuracao" value="<?=$arr[$i]->id_configuracao['id_configuracao']?>" type="hidden" />
																</div>
															</div>
															<div class="row">
																<label style="width:245px">Email para newsletter:</label>
																<br />
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="email_newsletter" id="email_newsletter" value="<?=$arr[$i]->email_newsletter['email_newsletter']?>" type="text" /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label style="width:245px">Endereço SMTP: (Envio de email)</label>
																<br />
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="endereco_smtp" id="endereco_smtp" value="<?=$arr[$i]->endereco_smtp['endereco_smtp']?>" type="text" /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label style="width:245px">Senha SMTP: (Envio de email)</label>
																<br />
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="senha_smtp" id="senha_smtp" value="<?=$arr[$i]->senha_smtp['senha_smtp']?>" type="text" /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label style="width:245px">Próximo backup da base:</label>
																<br />
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="date_bd_backup" id="date_bd_backup" value="<?=implode("/",array_reverse(explode("-",$arr[$i]->date_bd_backup['date_bd_backup'])));?>" type="text" title="O nome da versão é importante." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label style="width:245px">Próximo backup dos arquivos:</label>
																<br />
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="date_file_backup" id="date_file_backup" value="<?=implode("/",array_reverse(explode("-",$arr[$i]->date_file_backup['date_file_backup'])));?>" type="text" /></span>
																	<span class="system negative"></span>
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