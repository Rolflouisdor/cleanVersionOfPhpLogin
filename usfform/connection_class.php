
<?php
// made a class for the database connection and quering to database as well we can re-use this libary with different projects in the feature without having to change anything in this class it will boost our productivity time 
/*
	@Author: Rolf Louisdor
	@liscen: University Of South Florida 
	@Website: www.usfsm.edu
	

*/
class mySQL{
	
	private $servername;
	private $username;
	private $password;
	private $database;
	
	public $dbs; // variable for storing connection	
	
	
	public function connect($set_servername, $set_username, $set_password, $set_database){
		
		$this->servername = $set_servername;
		$this->username = $set_username;
		$this->password = $set_password;
		$this->database = $set_database;
		
		$this->dbs = new MySQLi($this->servername, $this->username, $this->password, $this->database);
		//check for error connections
		
		//check for connection error 
		$error = $this->dbs->connect_error;
	
			if($error){
			die("Connect Error :".$error);
			}
			else
			{
		 	echo"<h2 style='color:green'>We are connected to the db successfully</h2>";	
			}
		
	}
	public function query($sql)
	{
		
		return mysqli_query($sql,$this->dbs);// specify connection handle when querying 
	}
	
	public function fetch($sql)
	{
		return mysqli_fetch_array($this->query($sql));		
	}
	
}


