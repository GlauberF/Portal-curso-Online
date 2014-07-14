<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "cad":
				$cad = new Control();
				$cad->cadProfessor($_POST["nome"], $_POST["email"], $_POST["tel"], $_POST["cel"], $_POST["cpf"], $_POST['cliente_idcliente'], $_POST["comissao"]);
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
					<?php
					if(isset($_GET['nu'])){
						$c = new Control();
						$arr = $c->Controle_compra($_GET['nu'], $_GET['ed']);
						for ($i = 0; $i < count($arr); $i++){					
					?>
					<div class="section">
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
												
												<h3>Venda: #id: <?=$arr[$i]->id['id']?></h3><span style="float: right;"><b>Status:</b> <span style="font-size: 14px; color: red;"><?=$arr[$i]->status['status']?></span></span>
												<b>Transaction id:</b> <?=$arr[$i]->notification_id['notification_id']?><br><br>
												<b>Modo de pagamento:</b> <?=$arr[$i]->modo_pag['modo_pag']?><br><br>
												<b>Data:</b> <?=$arr[$i]->data['data']?><br><br>
												<b>Valor:</b> R$ <?=$arr[$i]->valor['valor']?><br><br>												 												 												 
												<b>Nome comprador:</b> <?=$arr[$i]->nome['nome']?><br><br>												 												 												 												 
												<b>Email comprador:</b> <?=$arr[$i]->email['email']?><br><br>	
												<b>Itens da compra:</b><br>
												<ul>
												 <?php
												 $arre = $c->Controle_compracurso($arr[$i]->id['id']);
												 	for ($i = 0; $i < count($arre); $i++){
												 		echo '<li>'.$arre[$i]->nome['nome'].' - R$ '.$arre[$i]->valor['valor'].'</li>';
												 	}
												 ?>	
												</ul>											 												 											 												 												 												 												 
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
						</div>
					</div>
					<?php
						}
					}
					?>					
					<div class="section table_section">
						<div class="title_wrapper">
							<h2>Vendas feitas</h2>
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
																	$arr = $c->Controle_compra($id = null, $_GET['ed']);
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