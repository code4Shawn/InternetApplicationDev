<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'btc3205');

class DBConnector{
	public $conn;

	function __construct(){

	$conn = mysqli_connect("localhost","root","","btc3205");
	if ($conn-> connect_error){
		die("No Connection:". $conn-> connect_error);
	}
		}



/*	function __construct(){
		$this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die("Error:".mysql_error());
		mysqli_select_db(DB_NAME,$this->conn);
	}

	public function closeDatabase(){
		mysqli_close($this->conn);
	}
	*/
}

?>