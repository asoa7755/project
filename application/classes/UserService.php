<?php
//include_once './interfaces/IUserService.php';
include_once 'Repository.php';
include_once 'interfaces/IUserService.php';

class UserService extends Repository implements IUserService
{
    protected $_repository;

    public function __construct()
    {
        parent::__construct();  
    }          
 
    public function addUser($email, $password, $firstname,$lastname,$role)
    {
        $this->execute("INSERT INTO USERS (Email,Password,Firstname,Lastname,Role) VALUES ('$email','$password','$firstname','$lastname',$role)");  
    }

    public function login($email,$password)
    {
        $result = $this->getData("SELECT * FROM USERS WHERE Email='$email' AND Password='$password' ");
        
        if ($result==false )
        {
            return false;
        }
        else{
            return true;
        }       
    }
}

