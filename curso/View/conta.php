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
													$arr = $c->Controle_usuario_admin($id_usuario_admin);
													for ($i = 0; $i < count($arr); $i++){
												?>
												<h3>Usuário do sistema: <?=$arr[$i]->nome_completo_usuario_admin['nome_completo_usuario_admin']?></h3>
												<b>Email:</b> <?=$arr[$i]->email_usuario_admin['email_usuario_admin']?><br /><br />
												<form>
												<fieldset style="border: 0px">
												<div class="forms">
												   <div class="row">
													  <div class="buttons">
														 <ul>
															   <li><span class="button cancel_btn"><span><span><a href="usuario_admin.php?nu=<?=$arr[$i]->id_usuario_admin['id_usuario_admin']?>">Alterar informações</a></span></span></span></li>
														 </ul>
													  </div>
												   </div>
												</div>
												</fieldset>
												</form>
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

				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>

</body>
</html>