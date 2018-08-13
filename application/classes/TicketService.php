<?php
include_once('Repository.php');
include_once('../../interfaces/ITicketService.php');


class TicketService extends Repository implements ITicketService
{
    protected $_repository;

    public function __construct()
    {
        parent::__construct();  
    }          
 
    public function add($userid,$serviceid,$statusid,$comments)
    {
        $this->execute('INSERT INTO TICKETS (UserId,ServiceId,Status, Description,CreationDate) VALUES (1,'.$serviceid.','.$statusid.',"'.$comments.'",NOW() )') ; 
    
    }

    //reply ticket
    public function reply($ticketid,$statusid,$comments)
    {


    }
    
    //It will get the ticket by staff. It will apply y role.
    public function getbyStaff($username)
    {           
        $result = $this->getData("SELECT * FROM TICKETS, USERS WHERE TICKETS.UserId= USERS.Id");

        return $result;
    }

    //It will get teh student appying the role
    public function getbyStudent($username)
    {
        $result = $this->getData("SELECT * FROM TICKETS, USERS WHERE TICKETS.UserId= USERS.Id AND USERS.UserName='$username' AND USERS.Role=1");

         return $result;
    }

    //It will get teh student appying the role
    public function getbyAdmin($username)
    {

    }

    //get all users includig admins
    public function getAll()
    {

    }

    //update ticket by passing id
    public function update($ticketid,$status,$comments,$staffid)
    {
        $this->execute('UPDATE TICKETS SET Status='.$status.',Description="'.$comments.'",SourceTicketId='.$staffid.')  WHERE ID='.$ticketid) ; 
    }

    public function sendEmail(){}
}
?>