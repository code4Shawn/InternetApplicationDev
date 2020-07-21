<?php
interface UserOperation
{
    public function getData();
    public function addUser();
    public function deleteUser($i);
    public function updateUser($f, $l, $c, $i);
    public function validateForm();
    public function creatFormSessionErr();
}
