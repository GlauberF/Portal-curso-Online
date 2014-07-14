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
													<li><a href="aluno.php" class="d13"><span>Alunos</span></a></li>
													<li><a href="parceiro.php" class="d16"><span>Parceiros</span></a></li>													
													<li><a href="concurso.php" class="d14"><span>Cursos</span></a></li>
													<li><a href="curso.php" class="d15"><span>Disciplinas</span></a></li>
													<li><a href="aula.php" class="d5"><span>Aulas</span></a></li>
													<li><a href="material.php" class="d2"><span>Material</span></a></li>																										
													<li><a href="vendas.php" class="d20"><span>Vendas</span></a></li>														
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
							<h2>Últimas vendas</h2>
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
																	<th><a href="#" class="asc">ID#</a></th>
																	<th><a href="#" class="desc">Nome</a></th>
																	<th><a href="#">Descrição</a></th>
																	<th style="width: 96px;">Ações</th>
																</tr>
															</thead>
															<tbody>
																<?php
																define('TABLE1', 'odd gradeX');
																define('TABLE2', 'odd gradeA');
																$c = new Control();
																$arr = $c->Dynamic_version($id = null);
																for ($i = 0; $i < count($arr); $i++){
	
																?>
																	<tr class="<? if($i % 2){ echo TABLE1; }else{ echo TABLE2; }?>">
																		<td><?=$arr[$i]->atualizacao_numero['atualizacao_numero']?></td>
																		<td><?=$arr[$i]->nome['nome']?></td>
																		<td><?=$arr[$i]->descricao['descricao']?></td>
																		<td>
																			<div class="actions">
																				<ul>
																					<li><a class="action2" href="versao.php?ed=<?=$arr[$i]->id['id']?>">2</a></li>
																					<li><a class="action4" href="versao.php?action=out&nu=<?=$arr[$i]->id['id']?>" onclick="return confirm('Deletar a versão: <?=$arr[$i]->atualizacao_numero['atualizacao_numero'] ?> - <?=$arr[$i]->nome['nome'] ?>?')">4</a></li>
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
																	<th><a href="#" class="asc">ID#</a></th>
																	<th><a href="#" class="desc">Nome</a></th>
																	<th><a href="#">Descrição</a></th>
																	<th style="width: 96px;">Ações</th>
																</tr>
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

