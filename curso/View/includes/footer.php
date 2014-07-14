	<div id="footer">
		<div id="footer_inner">
		<dl class="copy">
			<dt>
				<strong>Cicle Tecnologia - Sistema administrativo</strong>
				<em>
					versão
					<?php
						$c = new Control();
						$arr = $c->Estatic_version();
						for ($i = 0; $i < count($arr); $i++){
							echo $arr[$i]->atualizacao_numero['atualizacao_numero'];
						}
					?>
				</em>
			</dt>
			<dd>&copy; <?php echo date('Y'); ?> webrainstorming.com  Todos os direitos reservados.</dd>
		</dl>


<!--
		<dl class="help_links">
			<dt><strong>Precisa de ajuda ?</strong></dt>
			<dd>
				<ul>
					<li><a href="#">Email</a></li>
					<li><a href="#">FAQ</a></li>
					<li class="last"><a href="#">Wiki</a></li>
				</ul>
			</dd>
		</dl>
-->
		</div>
	</div>