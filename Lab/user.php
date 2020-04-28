<?php

	include "crud.php";
	include "authenticator.php";
	include_once 'DBConnector.php';

	class User implements crud, Authenticator{

		private $user_id;
		private $first_name;
		private $last_name;
		private $city_name;

		private $username;
		private $password;
				
		function __construct($first_name, $last_name, $city_name, $username, $password){

			$this->conn = new DBConnector;
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->city_name = $city_name;
			$this->username = $username;
			$this->password = $password;
		}

		public static function create(){
			$instance = new self();
			return $instance;
		}
		//username setter
		public function setUsername($username){
			$this->username = $username;
		}
		//username getter
		public function getUsername(){
			return $this->username;
		}
		//password setter
		public function setPassword($password){
			$this->password = $password;
		}
		//password getter
		public function getPassword(){
			return $this->password;
		}
		//user id setter
		public function setUserID($user_id){
			$this->$user_id = $user_id;
		}
		//user id getter
		public function getUserID($user_id){
			return $this->$user_id;
		}
		
	    public function save(){

			$fn = $this -> first_name;
			$ln = $this -> last_name;
			$city = $this -> city_name;
			$uname = $this-> username;
			$pass = $this-> password;

			$res = "INSERT INTO user (first_name,last_name,user_city,username,password) VALUES ('".$fn."','".$ln."','".$city."','".$uname."','".$pass."')";

			if ($this->conn->conn->query($res)){

				return "Record Added successfully";
			}
			else {
				return null; 
			}
		}
		public function hashPassword(){
			//inbuilt function hashes passwords
			$this->password = password_hash($this->password, PASSWORD_DEFAULT);
		}
		public function isPasswordCorrect(){
			$con = new DBConnector;
			$found = false;
			$res = mysqli_query("SELECT * FROM user") or die("Error" . mysqli_error());

			while ($row = mysqli_fetch_array($res)) {
				if (password_verify($this->getPassword(), $row['password']) && $this->getUsername() == $row['uasername']) {
					$found = true;
				}
			}
			//close database connection
			$con->closeDatabase();
			return $found;
			//return true;
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
			//return true if the values are not empty
			$fn = $this-> first_name;
			$ln = $this-> last_name;
			$city = $this-> city_name;

			if ($fn == "" || $ln == "" || $city == "") {
				return false;
			}
			return true;
		}
		public function createFormErrorSession(){
			session_start();
			$_SESSION['form_errors'] = "All fields are required";
		}
		public function logout(){
			session_start();
			unset($_SESSION['username']);
			session_destroy();
			header("Location:lab1.php");
		}
	}
?>