<?php
	header( 'Cache-Control: no-cache' );
	//header( 'Content-type: application/xml; charset="utf-8"', true );
	require('../Model/connectDB.php');

		$vai = new MySQLDB();
		$id = mysql_real_escape_string( $_REQUEST['concurso_idconcurso'] );
		$resultado = array();
		
$sql = "SELECT *
			FROM curso
			WHERE concurso_idconcurso=$id;";
		$result = $vai->ExecuteQuery($sql);				
			while ($row = mysql_fetch_assoc($result)) {
				$resultado[] = array(
					'idcurso' => $row['idcurso'],
					'nome'	=> $row['nome'],
					'valor'	=> $row['valor'],
					'concurso_idconcurso'	=> $row['concurso_idconcurso']					
				);
			}
			echo( json_encode( $resultado ) );

?>			