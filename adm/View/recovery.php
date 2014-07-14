<?php
require('../Controller/controller.php');
$cad = new Control();
if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']) {
		case "ax":
			$cad = new Control();
			$cad->change($_POST["id"], $_POST["password"]);
		break;
	}
}
if($cad->VerifyHelp($_REQUEST['id'], $_REQUEST['a'])){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- include the Tools -->
  <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>

  <!-- standalone page styling (can be removed) -->
  <link rel="shortcut icon" href="/media/img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="http://jquerytools.org/media/css/standalone.css"/>

  <!-- same styling as in minimal setup -->
<link rel="stylesheet" type="text/css" href="http://jquerytools.org/media/css/validator/form.css"/>

<!-- override it to have a columned layout -->
<link rel="stylesheet" type="text/css" href="http://jquerytools.org/media/css/validator/columns.css"/>
</head>
<body><form id="myform" class="cols" method="POST" action="recovery.php?action=ax">

   <table>
      <tr>
         <td>  <img src="http://vaidacerto.com/assets/img/logo.png"></td>
         <td><h3>Alterar senha Vai da Certo</h3></td>
      </tr>
   </table>

  <fieldset style="background: none;">
    <label> Senha <input type="password" name="password" minlength="4" /> </label>
    <label> Repetir senha <input type="password" name="check" data-equals="password" /><input type="hidden" name="id" value="<?=$_REQUEST['id']?>" /> </label>
  </fieldset>

  <div class="clear"></div>

  <button type="submit">Alterar senha</button>
</form>

<script>
      // Regular Expression to test whether the value is valid
    $.tools.validator.fn("[type=time]", "Please supply a valid time", function(input, value) {
    return /^\d\d:\d\d$/.test(value);
    });
        $.tools.validator.fn("[data-equals]", "As senhas n&atilde;o combinam", function(input) {
    var name = input.attr("data-equals"),
    field = this.getInputs().filter("[name=" + name + "]");
    return input.val() == field.val() ? true : [name];
    });
        $.tools.validator.fn("[minlength]", function(input, value) {
    var min = input.attr("minlength");

    return value.length >= min ? true : {
    en: "Insira pelo menos " +min+ " caracteres" + (min > 1 ? "s" : ""),
    fi: "Kent&auml;n minimipituus on " +min+ " merkki&auml;"
    };
    });

        $("#myform").validator({
    position: 'top left',
    offset: [-12, 0],
    message: '<div><em/></div>' // em element is the arrow
    });
  </script>
</body>
</html>
<?php
}else{
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
                     <h2>Esta página não existe mais</h2>
						</label>

						<ul class="form_menu">
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
<?php
}
?>