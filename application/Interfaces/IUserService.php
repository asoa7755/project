<?php
interface IUserService { 

    public function addUser($username, $email, $password, $firstname,$lastname,$role);
    
    public function addUserwithServiceId($username, $email, $password, $firstname,$lastname,$role, $serviceid);

    public function login($username,$password);

    public function loginByRole($username,$password);

    public function getTotalStudents();

    public function getTotalStaff();
}
?>