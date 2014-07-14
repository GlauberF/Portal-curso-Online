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
						<li><a href="index.php"><span><span>Home</span></span></a></li>
						<li><a href="#" class="selected"><span><span>Curso-online</span></span></a></li>						
						<li><a href="simulado.php"><span><span>Simulado</span></span></a></li>												
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
													<?php
														$c = new Control();
														$arr = $c->Controle_cliente($id = null);
														for ($i = 0; $i < count($arr); $i++){

													?>												
														<li>
															<a href="online_cliente.php?ed=<?=$arr[$i]->idcliente['idcliente']?>" style="background-image:url('<?=$arr[$i]->logo['logo']?>'); background-size: 80px; background-position-x: 50%; background-position-y: 5%;">
																<span style="display: block; padding: 85px 7px 0; font-size: 11px; text-align: center;"><?=$arr[$i]->nome['nome']?></span>
															</a>
														</li>
													<?php
														}
													?>
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

						<!--[if !IE]>end section content<![endif]-->
					</div>
					<!--[if !IE]>end section<![endif]-->
				</div>
			</div>
			<!--[if !IE]>end page<![endif]-->

			<!--[if !IE]>start sidebar<![endif]-->
			<div id="sidebar">
				<div class="inner">
					<div class="quick_info">
						<div class="quick_info_top">
							<h2>Quick info</h2>
						</div>
						<div class="quick_info_content">
							<dl>
								<dt>Clientes do online:</dt>
								<dd>0</dd>
							</dl>
							<dl>
								<dt>Clientes ativos:</dt>
								<dd>0</dd>
							</dl>
						</div>
						<span class="quick_info_bottom"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>

