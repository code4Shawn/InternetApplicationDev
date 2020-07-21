<?php
interface Authenticator{
    public function isPasswordCorrect($p, $hashedPass);
    public function hashPassword($p);
    public function logIn();
    public function logOut();
}
?>