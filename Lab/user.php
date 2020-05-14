<?php
	include "crud.php";
	include "authenticator.php";
	include_once 'DBConnector.php';

	class User implements Crud,Authenticator{
		private $user_id;
		private $first_name;
		private $last_name;
		private $city_name;
		private $username;
		private $password;
		private $utcTime;
		private $offset;
				
		function __construct($first_name, $last_name, $city_name, $username, $password, $utcTime, $offset){

			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->city_name = $city_name;
			$this->username = $username;
			$this->password = $password;
			$this->utcTime = $utcTime;
			$this->offset = $offset;
			$this->conn = new DBConnector;
		}
		//static constructor
		public static function create($first_name, $last_name, $city_name, $username, $password, $utcTime, $offset){
			$instance = new self();
			return $instance;
		}
		//username setter
		public function setUsername($username){
			$this->username = $username;
		}
		//username getter
		public function getUsername($username){
			return $this->username;
		}
		//password setter
		public function setPassword($password){
			$this->password = $password;
		}
		//password getter
		public function getPassword($password){
			return $this->password;
		}
		//utc_time setter
		public function setUtcTime($utcTime){
			$this->utcTime = $utcTime;
		}
		//utc_time getter
		public function getUtcTime($utcTime){
			return $this->utcTime; 
		}
		//offset setter
		public function setOffset($offset){
			$this->offset = $offset;
		}
		//offset getter
		public function getOffset($offset){
			return $this->offset;
		}
		//userID setter
		public function setUserID($user_id){
			$this->$user_id = $user_id;
		}
		//userID getter
		public function getUserID($user_id){
			return $this->$user_id;
		}
		
		//save user details
	    public function save(){
			$fn = $this->first_name;
			$ln = $this->last_name;
			$city = $this->city_name;
			$uname = $this->username;
			$this->hashPassword();
			$pass = $this->password;
			$utc  = $this->utcTime;
			$off = $this->offset;
			$res = "INSERT INTO user (first_name, last_name, user_city, username, password, utcTime, offset) VALUES('".$fn."','".$ln."','".$city."','".$uname."','".$pass."','".$utc."','".$off."')";
			if ($this->conn->conn->query($res)){
				return "Record Added successfully";
			}else {
				return null; 
			}
		}
		public function readAll(){
			return null;
		}
		public function readUnique(){
			return null;
		}
		public function search(){
			return null;
		}
		public function update(){
			return null;
		}
		public function removeOne(){
			return null;
		}
		public function removeAll(){
			return null;
		}
		public function validateForm(){
			$fn = $this->first_name;
			$ln = $this->last_name;
			$city = $this->city_name;
			if($fn == "" || $ln == "" || $city == ""){
				return false;
			}
			return true;
		}
		public function createFormErrorSessions(){
			session_start();
			$_SESSION['form_errors'] = "All Fields Are Required";
		}
		public function hashPassword(){
			$this->password = password_hash($this->password, PASSWORD_DEFAULT);
		}
		public function isPasswordCorrect(){
			$con = new DBConnector;
			$found = false;
			$res = "SELECT * FROM user";
			if ($this->conn->conn->query($res)){
				return "Record Added successfully";
			}else {
				return null; 
			}
			while ($row = mysqli_fetch($res)) {
				if (password_verify($this->getPassword(), $row['password'])&& $this->getUsername() == $row['username']) {
					$found = true;
				}
			}
			$con->closeDatabase();
			return $found;
		}
		public function login(){
			if ($this->isPasswordCorrect()) {
				header("Location:private_page.php");
			}
		}
		public function createUserSession(){
			session_start();
			$_SESSION['username'] = $this->getUsername();
		}
		public function logout(){
			session_start();
			unset($_SESSION['username']);
			session_destroy();
			header("Location:lab1.php");
		}
	}
?>