<?php
interface IUserService { 

    public function addUser($username, $email, $password, $firstname,$lastname,$role);
    
    public function login($username,$password);

    public function loginByRole($username,$password);

?>