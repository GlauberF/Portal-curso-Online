<?php
	include('includes/auth.php');
	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "layout":
				$cad = new Control();
				$cad->UseLayout($_GET['cliente'], $_GET['id']);
			break;	
			case "cache":
				$cad = new Control();
				$cad->Cache($_GET['id']);
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
						<div class="title_wrapper">
							<h2>Tema instalado</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<div class="section_content">
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
												<?php
													$c = new Control();
													$arr = $c->Controle_layout($_GET['ed']);
													if(count($arr) == 0){
														echo "<span style=\"margin: 350px;font-size: 20px;\">Nenhum tema cadastrado.</span>";
													}else{
														for ($i = 0; $i < count($arr); $i++){
												?>	
													<div id="tabs">
														<ul>
															<li><a href="#tabs-2">Tema</a></li>
														</ul>
														<div id="tabs-2">												
															<table>
																<tr>
																	<td><img src="<?=$arr[$i]->capa['capa']?>" width="90px"></td>
																	<td><a href="layout.php?action=cache&id=<?=$_GET['ed']?>">Limpar cache</a></td>						
																</tr>
															</table>						
														</div>	
													</div>												
												<?php
														}
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
							<h2>Temas disponíveis</h2>
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
																	<th><a href="#">Imagem</a></th>
																	<th><a href="#">Nome</a></th>
																	<th style="width: 96px;">A&ccedil;ões</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	define('TABLE1', 'first');
																	define('TABLE2', 'second');
																	$c = new Control();
																	$arr = $c->Controle_tema($id = null);
																	for ($i = 0; $i < count($arr); $i++){
																?>
																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																	<td>#<?=$arr[$i]->id['id']?></td>
																    <td><img src="<?=$arr[$i]->capa['capa']?>" width="80px"></td>
																	<td><?=$arr[$i]->nome['nome']?></td>
																	<td>
																		<?php
																			$arre = $c->Controle_layout($_GET['ed']);
																			if(count($arre) == 0){
																		?>	
																			<a href="layout.php?action=layout&cliente=<?=$_GET['ed']?>&id=<?=$arr[$i]->id['id']?>" style="font-size: 12px; font-weight: bold;">Usar layout</a>					
																		<?php		
																			}else{
																		?>	
																			<span style="font-size: 12px; font-weight: bold;">Layout escolhido</span>		
																		<?php
																			}
																		?>																		
																	</td>
																</tr>
																<?php
																	}
																?>
															</tbody>
															<tfoot>
																	<th><a href="#" class="desc"></a></th>
																	<th><a href="#">Imagem</a></th>
																	<th><a href="#">Nome</a></th>
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