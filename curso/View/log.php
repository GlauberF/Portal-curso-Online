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
			<? include('includes/header.php') ?>
			<div id="menus_wrapper">
				<div id="main_menu">
					<ul>
						<li><a href="#" class="selected"><span><span>Home</span></span></a></li>
						<li><a href="Financeiro.php"><span><span>Financeiro</span></span></a></li>
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

					<div class="section table_section">
						<div class="title_wrapper">
							<h2>Log do sistema</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<div class="section_content">
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
												<div id="tabs">
												  <ul>
												    <li><a href="#tabs-1">Esqueceu senha</a></li>
												    <li><a href="#tabs-2">Acesso ao sistema</a></li>
												  </ul>
												  <div id="tabs-1">
      												<!--[if !IE]>start table_wrapper<![endif]-->
      												<div class="table_wrapper">
      													<div class="table_wrapper_inner">
      														<table cellpadding="0" cellspacing="0" border="0" class="display" id="example1" width="100%">
      															<thead>
      																<tr>
      																	<th><a href="#" class="asc">ID#</a></th>
      																	<th><a href="#" class="desc">Descrição</a></th>
      																	<th><a href="#">Data</a></th>
      																	<th>Tipo</th>
      																</tr>
      															</thead>
      															<tbody>
      																<?php
      																	define('TABLE1', 'first');
      																	define('TABLE2', 'second');
      																	$c = new Control();
      																	$arr = $c->Controle_log('esqueceu senha');
      																	for ($i = 0; $i < count($arr); $i++){

      																?>
      																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
      																	<td><?=$arr[$i]->id_log['id_log']?></td>
      																	<td><?=$arr[$i]->descricao_log['descricao_log']?></td>
      																	<td><?=$arr[$i]->data['data']?></td>
      																	<td><?=$arr[$i]->tipo_log['tipo_log']?></td>
      																</tr>
      																<?php
      																	}
      																?>
      															</tbody>
      															<tfoot>
      																<tr>
      																	<th><a href="#" class="asc">ID#</a></th>
      																	<th><a href="#" class="desc">Descrição</a></th>
      																	<th><a href="#">Data</a></th>
      																	<th>Tipo</th>
      																</tr>
      															</tfoot>
      														</table>
      													</div>
      												</div>
      												<div class="table_menu">
      												</div>
      												<!--[if !IE]>end table menu<![endif]-->
                                       </div>
                                       <div id="tabs-2">
      												<!--[if !IE]>start table_wrapper<![endif]-->
      												<div class="table_wrapper">
      													<div class="table_wrapper_inner">
      														<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
      															<thead>
      																<tr>
      																	<th><a href="#" class="asc">ID#</a></th>
      																	<th><a href="#" class="desc">Descrição</a></th>
      																	<th><a href="#">Data</a></th>
      																	<th>Tipo</th>
      																</tr>
      															</thead>
      															<tbody>
      																<?php
      																	define('TABLE1', 'first');
      																	define('TABLE2', 'second');
      																	$c = new Control();
      																	$arr = $c->Controle_log('Login');
      																	for ($i = 0; $i < count($arr); $i++){

      																?>
      																<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
      																	<td><?=$arr[$i]->id_log['id_log']?></td>
      																	<td><?=$arr[$i]->descricao_log['descricao_log']?></td>
      																	<td><?=$arr[$i]->data['data']?></td>
      																	<td><?=$arr[$i]->tipo_log['tipo_log']?></td>
      																</tr>
      																<?php
      																	}
      																?>
      															</tbody>
      															<tfoot>
      																<tr>
      																	<th><a href="#" class="asc">ID#</a></th>
      																	<th><a href="#" class="desc">Descrição</a></th>
      																	<th><a href="#">Data</a></th>
      																	<th>Tipo</th>
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
					<?php //include('includes/log_view.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>