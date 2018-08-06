<?php
interface IUserService { 

    public function addUser($email, $password, $firstname,$lastname,$role);
    
    public function login($email,$password);

}
?>