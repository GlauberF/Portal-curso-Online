<?php
	header( 'Cache-Control: no-cache' );
	//header( 'Content-type: application/xml; charset="utf-8"', true );
	require('../Model/connectDB.php');

		$vai = new MySQLDB();
		$cod_estados = mysql_real_escape_string( $_REQUEST['estado'] );
		$cidades = array();

$sql = "SELECT cod_cidades, nome
			FROM cidades
			WHERE estados_cod_estados=$cod_estados
			ORDER BY nome";
		$result = $vai->ExecuteQuery($sql);
			while ($row = mysql_fetch_assoc($result)) {
				$cidades[] = array(
					'cod_cidades'	=> $row['cod_cidades'],
					'nome'			=> $row['nome'],
				);
			}
			echo( json_encode( $cidades ) );

?>