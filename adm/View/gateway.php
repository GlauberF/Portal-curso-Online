<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "cad":
				$cad = new Control();
				$cad->cadGateway($_POST["nome"], $_POST["email"], $_POST["token"], $_POST["ativo"], $_POST["cliente_idcliente"]);
			break;			
			case "edit":
				$cad = new Control();
				$cad->editGateway($_POST["id"], $_POST["nome"], $_POST["email"], $_POST["token"], $_POST["ativo"], $_POST["cliente_idcliente"]);
			break;				
			case "del":
				$cad = new Control();
				$cad->delGateway($_GET["nu"], $_GET["ed"]);
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
							<h2>Gateway Pagseguro</h2>

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
													$arr = $c->Controle_gateway($_GET['nu'], $_GET['ed']);
													for ($i = 0; $i < count($arr); $i++){
											?>
												<h3>Editar gateway: <?=$arr[$i]->nome['nome']?></h3>

													<form id="Pagseguro" action="gateway.php?action=edit" method="POST" class="search_form general_form">
														<fieldset>
															<div class="forms">
																<div class="row">
																	<label>Nome:</label>
																	<div class="inputs">
																		<span class="input_wrapper">
																			<input class="text" name="nome" id="nome" type="text" value="<?=$arr[$i]->nome['nome']?>" title="Campo obrigatório" />
																			<input name="id" id="id" type="hidden" value="<?=$arr[$i]->id['id']?>" />
																			<input name="cliente_idcliente" id="cliente_idcliente" type="hidden" value="<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>" />																																						
																		</span>
																		<span class="system negative"></span>
																	</div>
																</div>
																<div class="row">
																	<label>Email:</label>
																	<div class="inputs">
																		<span class="input_wrapper"><input class="text" name="email" value="<?=$arr[$i]->email['email']?>" id="email" type="text" title="Campo obrigatório." /></span>
																		<span class="system negative"></span>
																	</div>
																	</div>
																	<div class="row">
																		<label>Token:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="token" id="token" value="<?=$arr[$i]->token['token']?>" type="text" title="Campo obrigatório" /></span>
																			<span class="system negative"></span>
																		</div>
																	</div>		
																	<div class="row">
																		<label>Conta ativa:</label>
																		<div class="inputs">																			
																			<ul>
																				<li><input class="radio" name="ativo" value="1" type="radio" <?=$arr[$i]->ativo['ativo']?'checked':''?> /> Sim</li>
																				<li><input class="radio" name="ativo" value="0" type="radio" <?=!$arr[$i]->ativo['ativo']?'checked':''?> /> Não</li>
																			</ul>																			
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
											<?php
													}
												}else{
											?>
												<h3>Cadastrar novo gateway</h3>
													<form id="Pagseguro" action="gateway.php?action=cad" method="POST" class="search_form general_form">
														<fieldset>
															<div class="forms">
																<div class="row">
																	<label>Nome:</label>
																	<div class="inputs">
																		<span class="input_wrapper"><input class="text" name="nome" id="nome" type="text" title="O nome da conta é obrigatório" /></span>
																		<span class="system negative"></span>
																	</div>
																</div>
																<div class="row">
																	<label>Email:</label>
																	<div class="inputs">
																		<span class="input_wrapper">
																			<input name="cliente_idcliente" value="<?=$_GET['ed']?>" type="hidden" />
																			<input class="text" name="email" id="email" type="text" title="Formato de email inválido." /></span>
																		<span class="system negative"></span>
																	</div>
																	</div>
																	<div class="row">
																		<label>Token:</label>
																		<div class="inputs">
																			<span class="input_wrapper"><input class="text" name="token" id="token" type="text" title="O token da conta é obrigatório" /></span>
																			<span class="system negative"></span>
																		</div>
																	</div>		
																	<div class="row">
																		<label>Conta ativa:</label>
																		<div class="inputs">																			
																			<ul>
																				<li><input class="radio" name="ativo" id="ativo" value="1" type="radio" /> Sim</li>
																				<li><input class="radio" name="ativo" id="ativo" value="0" type="radio" /> Não</li>
																			</ul>																			
																		</div>
																	</div>																																		
																	<div class="row">
																		<div class="buttons">
																			<ul>
																				<li><span class="button send_form_btn"><span><span>Cadastrar</span></span><input name="" type="submit" /></span></li>
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
							<h2>Gateways de pagamento cadastrados</h2>
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
														<table cellpadding="0" cellspacing="0" border="0" class="display" id="gateway" width="100%">
															<thead>
																<tr>
																	<th><a href="#" class="desc"></a></th>
																	<th><a href="#">Nome</a></th>
																	<th><a href="#">E-mail</a></th>
																	<th><a href="#">Token</a></th>
																	<th><a href="#">Ativo</a></th>																		
																	<th style="width: 96px;">A&ccedil;ões</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$c = new Control();
																	$arr = $c->Controle_gateway($id = null, $_GET['ed']);
																	for ($i = 0; $i < count($arr); $i++){
																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td align="center">#<?=$arr[$i]->id['id']?></td>
																    <td align="center"><?=$arr[$i]->nome['nome']?></td>
																	<td align="center"><?=$arr[$i]->email['email']?></td>
																	<td align="center"><?=$arr[$i]->token['token']?></td>
																	<td align="center"><?=$arr[$i]->ativo['ativo']?'Sim':'Não'?></td>																	
																	<td>
																		<div class="actions">
																			<ul>
																				<li><a class="action2" href="gateway.php?nu=<?=$arr[$i]->id['id']?>&ed=<?=$_GET['ed']?>">2</a></li>																			
																				<li><a class="action4" href="gateway.php?action=del&nu=<?=$arr[$i]->id['id']?>&ed=<?=$_GET['ed']?>" onClick="return confirm('Deletar o método de pagamento <?=$arr[$i]->nome['nome']?>?')">4</a></li>
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
																<th><a href="#">E-mail</a></th>
																<th><a href="#">Token</a></th>
																<th><a href="#">Ativo</a></th>																
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