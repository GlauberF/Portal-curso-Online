<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="robots" content="noindex, nofollow" />
<meta name="googlebot" content="noindex, nofollow" />

<title>Cicle Administrador</title>
<link media="screen" rel="stylesheet" type="text/css" href="media/css/admin.css"  />
<link media="screen" rel="stylesheet" type="text/css" href="media/css/pass.css"  />
<style type="text/css" title="currentStyle">
	@import "media/css/table/demo_table.css";
	
	.demo {
		width: 200px;
		height: 400px;
		border-top: solid 1px #BBB;
		border-left: solid 1px #BBB;
		border-bottom: solid 1px #FFF;
		border-right: solid 1px #FFF;
		background: #FFF;
		overflow: scroll;
		padding: 5px;
	}	
	
	#sortable1 { list-style-type: none; margin: 0; padding: 0; margin-right: 10px; padding: 5px; width: 143px;}
	#sortable2 { list-style-type: none; margin: 0; padding: 0; margin-right: 10px; padding: 5px; width: 143px;}
	#sortable3 { list-style-type: none; margin: 0; padding: 0; margin-right: 10px; padding: 5px; width: 90%; height: 100px}
	#sortable1 li, #sortable2 li, #sortable3 li { margin: 5px; padding: 5px; font-size: 1.2em; width: 120px; }	
</style>


<!-- video.js -->
<link href="js/video-js/video-js.css" rel="stylesheet" type="text/css">
<script src="js/video-js/video.dev.js"></script>

<script>
    videojs.options.flash.swf = "js/video-js/video-js.swf";
</script>
<!-- video.js -->


<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="css/admin-ie.css" /><![endif]-->

<link rel="stylesheet" href="media/css/colorbox.css" />
<link rel="stylesheet" href="media/css/jquery-ui.css" />
<script type="text/javascript" src="http://mycardapio.com/View/Application/View/js/behaviour.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="js/jquery.colorbox.js"></script>

<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/jquery.maskMoney.js"></script>
<script src="js/password_strength_plugin.js"></script>
<script src="js/jquery.MultiFile.js"></script>
<script src="js/jquery.DataTables.js"></script>
<script src="js/tinylimiter.js"></script>

<script src="js/jquery.easing.js" type="text/javascript"></script>
<script src="js/jqueryFileTree.js" type="text/javascript"></script>
<link href="media/css/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />

<!--
data picker
-->
<script type="text/javascript">
	$(function(){
		var pickerOpts = {
			minDate: new Date(),
			dateFormat: "dd/mm/yy"
		};
		$("#date_in").datepicker(pickerOpts);
		$("#date_out").datepicker(pickerOpts);
	});
</script>



<script type="text/javascript">
	function addcat(valor){
	  document.getElementById('endereco_video').value = valor;
	}
</script>


<!--
tabs
-->
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>


<!--
color box
-->
<script>
	$(document).ready(function(){
		//Examples of how to assign the ColorBox event to elements
		$(".inline").colorbox({inline:true, width:"50%"});

		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});
</script>



<script src="js/validate.methods.js" type="text/javascript"></script>

<!--
<script type="text/javascript">
	$(document).ready(function(){
		$("#cep_bar").mask("99999-999");
	});
</script>
-->

<script type="text/javascript">
	$(document).ready( function() {	
		$('#fileTreeDemo_1').fileTree({ root: 'aulas/<?=FOLDER?>/', script: 'includes/jqueryFileTree.php' }, function(file) { 
			addcat(file);
		});			
	});
</script>

<!--
password strength
-->
<script>
	$(document).ready( function() {
		$(".password_test").passStrength({
			userid:	"#pass_bar"
		});
	});
</script>


<script>
function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Muito fraco";
	desc[1] = "Fraco";
	desc[2] = "Médio";
	desc[3] = "Médio forte";
	desc[4] = "Forte";
	desc[5] = "Muito forte";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
</script>



<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable();
		$('#concurso').dataTable();
		$('#professor').dataTable();
		$('#gateway').dataTable();
	} );
</script>

<script type="text/javascript" charset="utf-8">
$(function() {
 
    $( "ul.droptrue2" ).sortable({
    	connectWith: "ul",
		receive: function( event, ui ) {
			var nome = ui.item.data('nome');
			var value = ui.item.data('value');
			var atual = $("#valor").val();
			var result = Number(atual) + Number(value);
			$("#valor").val(result);
			alert('Curso ' + nome + ' adicionado com sucesso!');
		},    	
		remove: function( event, ui ) {			
			var nome = ui.item.data('nome');
			var value = ui.item.data('value');
			var atual = $("#valor").val();
			var result = Number(atual) - Number(value);
			$("#valor").val(result);
			alert('Curso ' + nome + ' retirado com sucesso!');
		}
    });
    
    $( "ul.droptrue3" ).sortable({
    	connectWith: "ul"
    });    
 
    $( "#sortable1, #sortable2, #sortable3" ).disableSelection();
});
</script>
<!--
mask money
<script type="text/javascript">
	$(function(){
		$("#valor_promocao").maskMoney();
	})
</script>
-->


</head>