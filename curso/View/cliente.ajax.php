<?php
	header( 'Cache-Control: no-cache' );
	//header( 'Content-type: application/xml; charset="utf-8"', true );
	require('../Model/connectDB.php');

		$vai = new MySQLDB();
		$id = mysql_real_escape_string( $_REQUEST['id_estabelecimento_id'] );
		$nome_estabelecimento = array();

$sql = "SELECT nome_estabelecimento
			FROM estabelecimento
			WHERE id_estabelecimento=$id;";
		$result = $vai->ExecuteQuery($sql);				
			while ($row = mysql_fetch_assoc($result)) {
				$nome_estabelecimento[] = array(
					'nome_cliente'	=> $row['nome_estabelecimento'],
				);
			}
			echo( json_encode( $nome_estabelecimento ) );

?>			