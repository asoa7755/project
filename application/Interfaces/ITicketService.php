<?php
class ITicketService{
    //add ticket
    public add($departmentid, $servicename,$statusid, $ticketnumber,$comments,$uploadfiles);
    
    //It will get the ticket by user. It will apply y role.
    public getbyUser($studentid);

    //get all users includig admins
    public getAll();
}

?>
