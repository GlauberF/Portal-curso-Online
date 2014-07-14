<?php

	include('includes/auth.php');
	require('../Controller/controller.php');

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
							<h2>Informação sobre a conta</h2>

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
													$arr = $c->Controle_aluno($_SESSION['idAluno']);
													for ($i = 0; $i < count($arr); $i++){
												?>
												<h3>Usuário do sistema: <?=$arr[$i]->nome['nome']?></h3>
												<b>Email:</b> <?=$arr[$i]->email['email']?><br /><br />
												<b>CPF:</b> <?=$arr[$i]->cpf['cpf']?><br /><br />
												<b>Tel:</b> <?=$arr[$i]->tel['tel']?><br /><br />
												<b>Cel:</b> <?=$arr[$i]->cel['cel']?><br /><br />
												<b>Endereço:</b> <?=$arr[$i]->endereco['endereco']?><br /><br />																																																
												<b>Complemento:</b> <?=$arr[$i]->complemento['complemento']?><br /><br />																																																												
												<b>CEP:</b> <?=$arr[$i]->cep['cep']?><br /><br />																																																																								
												<b>Bairro:</b> <?=$arr[$i]->bairro['bairro']?><br /><br />
												<b>Cidade - UF: </b>
													<?php
														if($arr[$i]->cidade['cidade']){
															$c = new Control();
															$arre = $c->Controle_cidades($arr[$i]->cidade['cidade']);
															for ($j = 0; $j < count($arre); $j++){
													?>
														<?php print $arre[$j]->cidade['cidade']; ?>, <?php print $arre[$j]->estado['estado']; ?>
													<?php
															}
														}
													?>																																																																																																
												<? } ?>
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
			<div id="sidebar">
				<div class="inner">
					<?php include('includes/menu_aluno.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>

</body>
</html>