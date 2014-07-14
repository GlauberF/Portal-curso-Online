<div class="quick_info">
	<div class="quick_info_top">
		<h2>Quick info</h2>
	</div>
	<div class="quick_info_content">
		<dl>
			<dt>User agent:</dt>
			<dd><?=$_SERVER['HTTP_USER_AGENT']?></dd>
		</dl>
		<dl>
			<dt>Seu IP:</dt>
			<dd><?=$_SERVER['REMOTE_ADDR']?></dd>
		</dl>
		<dl>
			<dt>Server type:</dt>
			<dd><?=$_SERVER['SERVER_SOFTWARE']?></dd>
		</dl>
		<dl>
			<dt>Versão atual do sistema:</dt>
			<dd>
			<?php
			   $c = new Control();
			   $arr = $c->Estatic_version();
			   for ($i = 0; $i < count($arr); $i++){
				  echo $arr[$i]->atualizacao_numero['atualizacao_numero']." - ".$arr[$i]->nome['nome'];
				}
			?>
			</dd>
		</dl>
	</div>
	<span class="quick_info_bottom"></span>
</div>

