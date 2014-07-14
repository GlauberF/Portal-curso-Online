<?php
	include('includes/auth.php');
	require('../Controller/controller.php');
	
	$c = new Control();
	$arr = $c->Controle_cliente($_SESSION['clienteAluno']);
	for ($i = 0; $i < count($arr); $i++){		
		define("FOLDER",$arr[$i]->folder['folder']);	
		define("LOGO",$arr[$i]->logo['logo']);			
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
					</ul>
				</div>
				<div id="sec_menu">
					<ul>
						<li><a href="javascript: history.go(-1)" class="sm5">Voltar</a></li>					
					</ul>
				</div>
			</div>
		</div>
		<div id="content">
			<div id="page">
				<?php
				if(isset($_GET['aula'])){
					echo "<div style=\"margin-left:10px; padding: 0 11px 0 0\">";					
				}else{
					echo "<div class=\"inner\">";
				}
				?>
					<div class="section">
						<? include('includes/alerta.php') ?>
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Aulas</h2>

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
												if(isset($_GET['aula'])){
													$arr = $c->Controle_aula($_GET['aula'], null);
													for ($i = 0; $i < count($arr); $i++){
												?>
												<div id="tabs">
													<ul>
												    	<li><a href="#tabs-2">Aula: <?=$arr[$i]->nome['nome']?></a></li>
												  	</ul>																								
													<div id="tabs-2">
														<table align="center" width="100%">
															<tr>
																<td width="55%">
																<?php
																	$arre = $c->Controle_material($arr[$i]->idaula['idaula']);
																	for ($j = 0; $j < count($arre); $j++){
																		echo "<iframe src=\"pdf.php?pdf=../../material/".FOLDER."/".$arre[$j]->endereco['endereco']."\" width=\"100%\" height=\"384px\" frameborder=\"0\"></iframe>";
																	}
																?>
																</td>															
																<td align="right">
																	<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="384" data-setup="{}">
																		<source src="video.php?tar=<?=$arr[$i]->idaula['idaula']?>" type='video/mp4' />
    																	<track kind="captions" src="vtt/<?=$_SESSION['emailAluno']?>.vtt" srclang="en" default><!-- Tracks need an ending tag thanks to IE9 -->																		
																	</video>													
																</td>
															</tr>
														</table>			
													</div>
												</div>														
												<?php
													}
												}else{
													echo "<h3 style=\"margin:30px\">Selecione um curso para assistir ao lado.</h3>";													
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
				</div>
			</div>
			<div id="sidebar">
				<div class="inner">
					<?php
						if(isset($_GET['nu'])){ 
							include('includes/menu.php');
						} 
						?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>

</body>
</html>