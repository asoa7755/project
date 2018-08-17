<?php
include_once('Repository.php');
include_once('../../interfaces/IUserService.php');

class UserService extends Repository implements IUserService
{
    protected $_repository;

    public function __construct()
    {
        parent::__construct();  
    }          
 
    public function addUser($username, $email, $password, $firstname,$lastname,$role)
    {
        $this->execute("INSERT INTO USERS (Email,Password,Firstname,Lastname,Role) VALUES ('$email','$password','$firstname','$lastname',$role)");  
    }

    public function addUserwithServiceId($username, $email, $password, $firstname,$lastname,$role, $serviceid)
    {
        $this->execute("INSERT INTO USERS (Email,Password,Firstname,Lastname,Role, ServiceId) VALUES ('$email','$password','$firstname','$lastname',$role,$serviceid)");  
    }

    public function login($username,$password)
    {
        $result = $this->getData("SELECT * FROM USERS WHERE UserName='$username' AND Password='$password' ");
        
        if ($result==false )
        {
            return false;
        }
        else{
            return true;
        }       
    }

    public function loginByRole($username,$password)
    {
        $result = $this->getData("SELECT * FROM USERS WHERE UserName='$username' AND Password='$password'");
       
        return $result;
    }
}

?>