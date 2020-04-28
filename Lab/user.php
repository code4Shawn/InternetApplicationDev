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
				
		function __construct($first_name, $last_name, $city_name, $username, $password){
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->city_name = $city_name;
			$this->username = $username;
			$this->password = $password;
			$this->conn = new DBConnector;
		}
		//static constructor
		public static function create(){
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
		public function setPassword($username){
			$this->password = $password;
		}
		//password getter
		public function getPassword($username){
			return $this->password;
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
			$res = "INSERT INTO user (first_name,last_name,user_city,username,password) VALUES('".$fn."','".$ln."','".$city."','".$uname."','".$pass."')";
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