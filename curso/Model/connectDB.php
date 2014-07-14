<?php 

class MySQLDB{ 
	
	private $host = "localhost";
	private $user = "root";
	private $senha = "";
	private $base = "curso_online";
	
	public function __construct(){
		$this->db = mysql_connect($this->host, $this->user, $this->senha, $this->base);
		if(!$this->db){
			echo "Erro: " . mysql_error();
			die();
		}elseif(!mysql_select_db($this->base, $this->db)){
			echo "Erro: " . mysql_error();
			die();
		}
		mysql_query("SET NAMES 'utf8'");
		mysql_query('SET character_set_connection=utf8');
		mysql_query('SET character_set_client=utf8');
		mysql_query('SET character_set_results=utf8');		
	}
	
	public function ExecuteQuery($query){
		$this->query = $query;
		return mysql_query($this->query);
	}
	
	public function close(){
		if(mysql_close($this->db)){
			$this->db = null;
		}
	}

	public function __destruct(){
		$this->close();
	}	
	
} 

?>