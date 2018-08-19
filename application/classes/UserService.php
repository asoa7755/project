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
        $this->execute("INSERT INTO USERS (UserName,Email,PASSWORD,FirstName,LastName,Role) VALUES ('$username','$email','$password','$firstname','$lastname',$role)");  
    }

    public function addUserwithServiceId($username, $email, $password, $firstname,$lastname,$role, $serviceid)
    {
        $this->execute("INSERT INTO USERS (UserName,Email,PASSWORD,Firstname,Lastname,Role, ServiceId) VALUES ('$username','$email','$password','$firstname','$lastname',$role,$serviceid)");  
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
    //It will get all users
    public function getalluser()
    {           
        $result = $this->getData("SELECT * FROM USERS ");

        return $result;
    }

    

    public function getTotalStaff()
    {
        $result = $this->getData("SELECT Count(*) FROM USERS WHERE Role=2");

        foreach ($result as $row)
        {
            return $row[0];
        }
    }


    public function getTotalStudents()
    {
        $result = $this->getData("SELECT Count(*) FROM USERS WHERE Role=1");

        foreach ($result as $row)
        {
            return $row[0];
        }
    
    
    }
  
}

?>