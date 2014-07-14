					<div class="quick_info">
						<div class="quick_info_top">
							<h2>Quick info</h2>
						</div>
						<?php
							$c = new Control();
							$arr = $c->Controle_cliente($_GET['ed']);
							for ($i = 0; $i < count($arr); $i++){
						?>						
						<div class="quick_info_content">
							<a class="inline" href="#<?=$arr[$i]->idcliente['idcliente']?>"><img src="<?=$arr[$i]->logo['logo']?>" width="200px" /></a>
								<div style='display:none'>
									<div id='<?=$arr[$i]->idcliente['idcliente']?>' style='padding:10px; background:#fff;'>
										<form id="" action="online_cliente.php?action=img" method="POST" enctype="multipart/form-data" class="search_form general_form">
											<div class="forms">
												<div class="row">
													<label>Logo:</label>
													<div class="inputs">
														<span class="input_wrapper">
															<input type="hidden" value="<?=$arr[$i]->idcliente['idcliente']?>" name="idcliente" />
															<input name="logo" id="logomarca" type="file" />
														</span>
													</div>
												</div>
												<div class="buttons">
													<ul>
														<li><span class="button send_form_btn"><span><span>Atualizar</span></span><input name="" type="submit" /></span></li>
													</ul>
												</div>
											</div>
										</form>
									</div>
								</div>																
						</div>
						<?php
							}
						?>						
						<span class="quick_info_bottom"></span>
					</div>