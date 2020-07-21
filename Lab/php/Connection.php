<?php
class Connection{
    protected $conn;
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB = "btc3205";
    private $HOST = "localhost";

    public function __construct(){
        if(!isset($conn)){
            $this->conn = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB) or die('Unable to connect to database'.mysqli_connect_error());
        }
    }
}

?>