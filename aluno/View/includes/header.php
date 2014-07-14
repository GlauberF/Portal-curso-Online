			<div id="logo_user_details">
				<img src="media/images/logo.png" width="130px" style="margin-left: 30px;">
				<div id="user_details">
					<ul id="user_details_menu">
						<li>Bem vindo <strong><?=$_SESSION['nomeAluno']?></strong></li>
						<li>
							<ul id="user_access">
								<li class="first"><a href="conta.php">Minha conta</a></li>
								<li class="last"><a href="includes/logout.php">Log out</a></li>
							</ul>
						</li>
						<!--						
						<li>
						   <a class="new_messages" href="contato.php">
						       <?php

	                           //$c = new Control();
	                           //$arri = $c->Contador($_SESSION['id']);
	                           //for ($g = 0; $g < count($arri); $g++){
	                              //echo $arri[$g]->countt['countt'];
	                           //}

						       ?>0 novas mensagens
						   </a>
						</li>
						-->
					</ul>
					<div id="server_details">
						<dl>
							<dt>Hora do servidor :</dt>
							<dd><?php echo date('h:i:s A'); ?></dd>
						</dl>
						<dl>
							<dt>Último login ip :</dt>
							<dd>
								<?php
									$today = date("mdy");
								?>
							</dd>
						</dl>
					</div>
					<!--[if !IE]>start search<![endif]-->
					<div id="search_wrapper">
						<form action="#">
							<fieldset>
								<label>
									<input class="text" name="" type="text" />
								</label>
								<span class="go"><input name="" type="submit" /></span>
							</fieldset>
						</form>
						<ul id="search_wrapper_menu">
							<li class="first"><a href="#">Advanced Search</a></li>
							<li class="last"><a href="#">Admin Map</a></li>
						</ul>
					</div>
				</div>
			</div>