<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "out":
				$cad = new Control();
				$cad->delVenda($_REQUEST["nu"], $_REQUEST["ed"]);
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
					<div class="section table_section">
						<? include('includes/alerta.php') ?>						
						<div class="title_wrapper">
							<h2>Vendas disponíveis</h2>
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
																	<th><a href="#">Valor</a></th>
																	<th><a href="#">Disciplinas do pacote</a></th>																
																	<th style="width: 96px;">A&ccedil;ões</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	define('TABLE1', 'first');
																	define('TABLE2', 'second');
																	$c = new Control();
																	$arr = $c->Controle_venda($id = null, $_GET['ed']);
																	for ($i = 0; $i < count($arr); $i++){

																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td>#<?=$arr[$i]->id['id']?></td>
																    <td><?=$arr[$i]->nome['nome']?></td>																	
																    <td><?=$arr[$i]->valor['valor']?></td>
																	<td>
																		<ul class="mc_menu">
																			<?php
																				$arre = $c->Venda_many($arr[$i]->id['id']);
																				for ($j = 0; $j < count($arre); $j++){
																					echo "<li><a href='#'>".$arre[$j]->cursoNome['cursoNome']." - <strong>".$arre[$j]->concursoNome['concursoNome']."</strong></a></li>";	
																				}
																			?>																		
																		</ul>																	
																	</td>
																	<td>
																		<div class="actions">
																			<ul>
																				<li><a class="action2" href="edit_venda.php?nu=<?=$arr[$i]->id['id']?>&ed=<?=$_GET["ed"]?>">2</a></li>
																				<li><a class="action4" href="vendas.php?action=out&nu=<?=$arr[$i]->id['id']?>&ed=<?=$_GET["ed"]?>" onClick="return confirm('Deletar o pacote de vendas <?php print $arr[$i]->nome['nome']; ?>?')">4</a></li>
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
																	<th><a href="#">Valor</a></th>
																	<th><a href="#">Disciplinas do pacote</a></th>	
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
					<!--[if !IE]>start section<![endif]-->	
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Menu</h2>
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
													<li><a href="cad_venda.php?ed=<?=$_GET["ed"]?>">Cadastrar nova venda</a></li>								
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

</body>
</html>