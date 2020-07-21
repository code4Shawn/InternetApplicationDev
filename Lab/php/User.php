<?php
session_start();
require_once "Connection.php";
require_once "UserOperation.php";
require_once "Authenticator.php";

class User extends Connection implements UserOperation, Authenticator
{
    private $first_name;
    private $last_name;
    private $city;
    private $id;
    private $username;
    private $password;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create()
    {
        $userInst = new self();
        return $userInst;
    }


    public function getData()
    {
        $sql = "SELECT * FROM user";
        $result = mysqli_query($this->conn, $sql);
        $arr = array();
        while ($row =   $result->fetch_assoc()) {
            array_push($arr, $row);
        }
        return ($arr);
    }

    public function userExists()
    {
        $sql = "SELECT * FROM user WHERE username LIKE ?";
        $statement = $this->conn->prepare($sql);
        $statement->bind_param('s', $this->username);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_assoc()) {
            if (isset($row["username"]))
                return true;
            else return false;
        }
    }

    public function addUser()
    {
        if (!$this->userExists()) {
            $sql = $this->conn->prepare("INSERT INTO  user (first_name, last_name, user_city, username, password) VALUES (?,?,?,?,?)");
            $hashedPass = $this->hashPassword($this->password);
            $sql->bind_param("sssss", $this->first_name, $this->last_name, $this->city, $this->username, $hashedPass);
            return   $sql->execute();
        } else {
            echo "Username  exists";
            return false;
        }
    }
    public function hashPassword($p)
    {
        return password_hash($p, PASSWORD_DEFAULT);
    }
    public function deleteUser($i)
    {
        $sql = $this->conn->prepare("DELETE  FROM  user WHERE id = ?");
        $sql->bind_param("i", $i);
        return $sql->execute();
    }

    public function updateUser($f, $l, $c, $i)
    {
        $sql = $this->conn->prepare("UPDATE user SET first_name = ?, last_name = ?, user_city = ? WHERE id = ?");
        $sql->bind_param("sssi", $f, $l, $c, $i);
        return $sql->execute();
    }

    public function validateForm()
    {
        if ($this->first_name != "" && $this->last_name != "" && $this->city != "")
            return true;
        return false;
    }

    public function creatFormSessionErr()
    {
        $_SESSION['form_error'] = "All fields are required";
    }

    public function isPasswordCorrect($p, $hashedPass)
    {
        return password_verify($p, $hashedPass);
    }
    public function logIn()
    {
        $sql = "SELECT * FROM user WHERE username LIKE ?";
        $statement = $this->conn->prepare($sql);
        $statement->bind_param('s', $this->username);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_assoc()) {
            if (isset($row["password"])) {
                if ($this->isPasswordCorrect($this->password, $row["password"])) {
                    $_SESSION["username"] = $row["username"];
                    header("location: private.php");
                } else {
                    echo ("Password failed to verify");
                }
            }
        }
    }
    public function logOut()
    {
        unset($_SESSION["username"]);
        header("location: login.php");
    }

    public function setFName($f)
    {
        $this->first_name = $f;
    }

    public function setLName($l)
    {
        $this->last_name = $l;
    }

    public function setCity($c)
    {
        $this->city = $c;
    }

    public function setId($i)
    {
        $this->city = $i;
    }

    public function setUsername($u)
    {
        $this->username = $u;
    }

    public function setPassword($p)
    {
        $this->password = $p;
    }

    public function __destruct()
    {
        $this->conn->close();
    }





    /* private function executeQuery($sql, $dt,  ){
        $sql = $this->conn->prepare($sql, );
        $sql->bind_param($dt, $f, $l, $c,$i);
        return $sql->execute();
    }*/
}
