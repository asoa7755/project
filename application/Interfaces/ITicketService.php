<?php
class ITicketService{
    //add ticket
    public add($userid,$departmentid,$statusid, $ticketid,$comments,$uploadfiles);

    //reply ticket
    public reply($ticketid,$statusid,$comments);
    
    //It will get the ticket by user. It will apply y role.
    public getbyStaff($username);

    //It will get teh student appying the role
    public getbyStudent($username);

    //It will get teh student appying the role
    public getbyAdmin($username);

    //get all users includig admins
    public getAll();

    //update ticket by passing id
    public update($ticketid, $status,$comment);

    private sendEmail();
}

?>
