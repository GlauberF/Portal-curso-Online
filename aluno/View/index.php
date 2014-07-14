<?php
include('includes/auth.php');
require('../Controller/controller.php');
include('includes/head.php');
?>

<body>
	<!--[if !IE]>start wrapper<![endif]-->
	<div id="wrapper">
		<!--[if !IE]>start head<![endif]-->
		<div id="head">
			<?php include('includes/header.php'); ?>
			<div id="menus_wrapper">
				<div id="main_menu">
					<ul>
						<li><a href="#" class="selected"><span><span>Home</span></span></a></li>
					</ul>
				</div>
				<div id="sec_menu">
				<!--
					<ul>
						<li><a href="#" class="sm7">Emails</a></li>
					</ul>
				-->
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
													<li><a href="aulas.php" class="d4"><span>Minhas aulas</span></a></li>
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
							<h2>Últimas compras</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<div class="section_content">
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">

												<fieldset>
												<!--[if !IE]>start table_wrapper<![endif]-->
												<div class="table_wrapper">
													<div class="table_wrapper_inner">
														<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
															<thead>
																<tr>
																	<th><a href="#" class="desc"></a></th>
																	<th><a href="#">Data</a></th>
																	<th><a href="#">Meio de pagamento</a></th>
																	<th><a href="#">Valor</a></th>																	
																	<th><a href="#">Status</a></th>																																		
																	<th style="width: 96px;">A&ccedil;ões</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	define('TABLE1', 'first');
																	define('TABLE2', 'second');
																	$c = new Control();
																	$arr = $c->Controle_compra($id = null, $_SESSION['idAluno']);
																	for ($i = 0; $i < count($arr); $i++){

																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td>#<?=$arr[$i]->id['id']?></td>
																	<td><?=$arr[$i]->data['data']?></td>
																	<td><?=$arr[$i]->modo_pag['modo_pag']?></td>
																	<td>R$ <?=$arr[$i]->valor['valor']?></td>
																	<td><?=$arr[$i]->status['status']?></td>																																		
																	<td>
																		<div class="actions">
																			<ul>
																				<li><a class="action2" href="financeiro.php?nu=<?=$arr[$i]->id['id']?>&ed=<?=$arr[$i]->cliente_idcliente['cliente_idcliente']?>">2</a></li>
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
																	<th><a href="#">Data</a></th>
																	<th><a href="#">Meio de pagamento</a></th>
																	<th><a href="#">Valor</a></th>																	
																	<th><a href="#">Status</a></th>		
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
			<!--[if !IE]>end page<![endif]-->

			<!--[if !IE]>start sidebar<![endif]-->
			<div id="sidebar">
				<div class="inner">
				<?php include('includes/info.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>

