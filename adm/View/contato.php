<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "read":
				$cad = new Control();
				$cad->readcontact($_GET["nu"]);
			break;
			case "out":
				$cad = new Control();
				$cad->delcontact($_GET["nu"]);
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
						<div class="title_wrapper">
							<h2>Home</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<div class="section_content">
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
												<div class="dashboard_menu_wrapper">
												<ul class="dashboard_menu">
													<li><a href="novo_contato.php" class="d6"><span>Nova mensagem</span></a></li>
												</ul>
												</div>
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
							<h2>Contatos</h2>
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
														<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
															<thead>
																<tr>
																	<th>#Id</th>
																	<th>Estabelecimento</th>
																	<th>Assunto</th>
																	<th>Ações</th>
																</tr>
															</thead>
															<tbody>
															<?php
																define('TABLE1', 'odd gradeX');
																define('TABLE2', 'odd gradeA');
																$c = new Control();
																$arr = $c->Controle_contato($id, 1, $id_usuario_admin);
																for ($i = 0; $i < count($arr); $i++){
															?>
															<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>" <?php if($arr[$i]->novo['novo'] == 1){ ?> style="font-weight: bold;" <?php } ?>>
																<td><?=$arr[$i]->id_contato['id_contato']?></td>
																<td><?=$arr[$i]->nome_estabelecimento['nome_estabelecimento']?></td>
																<td><?=$arr[$i]->assunto['assunto']?></td>
																<td class="center">
																	<div class="actions">
																		<ul>
																			<li><a class="action1" href="contato.php?action=read&nu=<?=$arr[$i]->id_contato['id_contato']?>">2</a></li>
																			<li><a class="action4" href="contato.php?action=out&nu=<?=$arr[$i]->id_contato['id_contato']?>" onClick="return confirm('Deletar o contato de <?php print $arr[$i]->nome['nome']; ?> ?')">4</a></li>
																		</ul>
																	</div>
																</td>
															</tr>
															<?php
																}
															?>
															</tbody>
															<tfoot>
																<tr>
																	<th>#Id</th>
																	<th>Estabelecimento</th>
																	<th>Assunto</th>
																	<th>Ações</th>
																</tr>
															</tfoot>
														</table>
													</div>
												</div>
												<div class="table_menu">
												</div>
												<!--[if !IE]>end table menu<![endif]-->
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
			<!--[if !IE]>start sidebar<![endif]-->
			<div id="sidebar">
				<div class="inner">
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Sidebar Menu</h2>
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
												<ul class="sidebar_menu">
													<li>
													  <a href="#">Inbox</a>
													</li>
													<li>
													  <a href="itens_enviado.php">Itens enviados</a>
													</li>
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
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>