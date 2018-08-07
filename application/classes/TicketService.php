<?php
include_once 'Repository.php';
include_once 'interfaces/ITicketService.php';

class TicketService extends Repository implements ITicketService
{
    protected $_repository;

    public function __construct()
    {
        parent::__construct();  
    }          
 
    //add ticket
    public add($userid,$departmentid,$statusid, $ticketid,$comments,$uploadfiles)
    {
        $this->execute("INSERT INTO TICKETS (UserId,DepartmentId,Status,Description,CreationDate) VALUES ($userid,$departmentid,$statusid,$comments, (SELECT NOW()))");  
    }

    //reply ticket
    public reply($ticketid,$statusid,$comments)
    {


    }
    
    //It will get the ticket by user. It will apply y role.
    public getbyStaff($username)
    {

    }

    //It will get teh student appying the role
    public getbyStudent($username)
    {

    }

    //It will get teh student appying the role
    public getbyAdmin($username)
    {

    }

    //get all users includig admins
    public getAll()
    {

    }

    //update ticket by passing id
    public update($ticketid, $status,$comment);

    private sendEmail();
}
