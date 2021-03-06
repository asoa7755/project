<?php
interface ITicketService{
    //add ticket
    //public add($userid,$departmentid,$statusid, $ticketid,$comments,$uploadfiles);
   // public function add($userid,$departmentid,$statusid, $ticketid,$comments,$uploadfiles);

    public function add($userid,$serviceid  ,$statusid,$comments);

    public function addandGetId($userid,$serviceid,$statusid,$comments);

    public function addWithimage($userid, $serviceid,$statusid,$comments,$file);

    public function addImage($ticketid, $userid, $filename,$extension,$file);
    //reply ticket
    public function reply($ticketid,$statusid,$comments);
    
    //It will get the ticket by user. It will apply y role.
    public function getbyStaff($username);

    //It will get teh student appying the role
    public function getbyStudent($username);

    //It will get teh student appying the role
    public function getbyAdmin($username);

    //get all users includig admins
    public function getAll();

    //update ticket by passing id
    public function update($ticketid,$status,$comments,$staffid);

    public function updateandEmail($ticketid,$status,$comments,$staffid,$username);

    public function sendEmail();

    public function search($term,$username, $role);

    public function getTotalHotTickets();

    public function getAvgTicketsDuration();

    public function getTicketswithdepartmentservice();

    public function getTotalHotTicketUsers();        
}

?>
