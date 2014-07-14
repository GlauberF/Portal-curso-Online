<?php
	require('../Controller/controller.php');
	
	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "ax":
				$cad = new Control();
				$cad->helpLogin($_POST["email"]);
			break;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Vai da certo</title>
<link media="screen" rel="stylesheet" type="text/css" href="css/admin-login.css"  />
<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="css/admin-login-ie.css" /><![endif]-->

</head>

<body>
	<!--[if !IE]>start wrapper<![endif]-->

	<div id="wrapper">

		<!--[if !IE]>start login wrapper<![endif]-->
		<div id="login_wrapper">


			<?php include('includes/alerta.php'); ?>


			<!--[if !IE]>start login<![endif]-->
			<form action="<?=$_SERVER['PHP_SELF']; ?>?action=ax" method="POST">
				<fieldset>

					<h1 id="logo"><a href="#">Painel administrativo Vai da certo!!</a></h1>
					<div class="formular">
						<div class="formular_inner">

						<label>
							<strong>E-mail:</strong>
							<span class="input_wrapper">
								<input name="email" type="text" />
							</span>
						</label>
						<!--
						<label class="inline">
							<input class="checkbox" name="" type="checkbox" value="" />
							Lembrar deste computador
						</label>
						-->

						<ul class="form_menu">
							<li><input type="submit" value="Enviar"/></li>
							<li><input type="button" onClick="parent.location='login.php'" value="Voltar"></li>
						</ul>

						</div>
					</div>
				</fieldset>
			</form>
			<!--[if !IE]>end login<![endif]-->
		</div>
		<!--[if !IE]>end login wrapper<![endif]-->
	</div>
	<!--[if !IE]>end wrapper<![endif]-->
</body>
</html>
