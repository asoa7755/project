    <?php
include_once('Repository.php');
include_once('../../interfaces/ITicketService.php');
include_once('../../interfaces/IEmailService.php');
include_once('../../classes/EmailService.php');



class TicketService extends Repository implements ITicketService
{
    protected $_repository;
    protected $_emailservice;

    public function __construct()
    {
        parent::__construct();  
        
        $_emailservice= new EmailService();
    }          
 
    public function add($userid,$serviceid,$statusid,$comments)
    {
        $this->execute('INSERT INTO TICKETS (UserId,ServiceId,Status, Description,CreationDate) VALUES ('.$userid.','.$serviceid.','.$statusid.',"'.$comments.'",NOW() )') ; 
    }

    public function addandGetId($userid,$serviceid,$statusid,$comments)
    {
        $this->execute('INSERT INTO TICKETS (UserId,ServiceId,Status, Description,CreationDate) VALUES ('.$userid.','.$serviceid.','.$statusid.',"'.$comments.'",NOW() )') ; 
        $tiketid = 0;

        $result = $this->getData("SELECT * FROM TICKETS ORDER BY ID DESC LIMIT 1" );

        foreach ($result as $row )
        {
            $tiketid = $row[0];
        }

        return $tiketid;
    }

    public function addWithimage($userid, $serviceid,$statusid,$comments,$file)
    {
        $this->execute('INSERT INTO TICKETS (UserId,ServiceId,Status, Description,CreationDate) VALUES ('.$userid.','.$serviceid.','.$statusid.',"'.$comments.'",NOW() )') ; 
    
        $result = $this->getData("SELECT * FROM TICKETS ORDER BY ID DESC LIMIT 1" );

        foreach ($result as $row )
        {
            $this->execute("INSERT INTO FILES (TicketId,File,Name, Extension,CreationDate) VALUES (".$row[0].",'".$file."','big file','jpg',NOW() )") ; 
        }

    }

    public function addImage($ticketid, $userid, $filename,$extension,$file)
    {
       $this->execute("INSERT INTO FILES (TicketId,File,Name, Extension,CreationDate) VALUES (".$ticketid.",'".$file."','".$filename."','".$extension."',NOW() )") ; 
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
        $this->execute('UPDATE TICKETS SET Status='.$status.',Description="'.$comments.'",SourceTicketId='.$staffid.' WHERE ID='.$ticketid) ; 
    }

    public function updateandEmail($ticketid,$status,$comments,$staffid,$username)
    {        
        $this->execute('UPDATE TICKETS SET Status='.$status.',Description="'.$comments.'",SourceTicketId='.$staffid.' WHERE ID='.$ticketid) ; 
        $result = $this->getData("SELECT * FROM USERS WHERE USERS.UserName='$username' AND USERS.Role=1");

        foreach ($result as $row)
        {
            $_emailservice->sendEmail($username,"service.desk@gmail.com",$row[2],'SUPORT TN:'.$ticketid,'IT Support is dealing with your request.');
        }

         return $result;

       
    }


    public function sendEmail(){}

    public function search($term,$username, $role)
    {                
        $result = $this->getData("SELECT * FROM TICKETS, USERS WHERE (USERS.Role=$role AND TICKETS.UserId= USERS.Id AND USERS.UserName='".$username."')  AND TICKETS.Description LIKE '%$term%'");

        return $result;
    }
}
?>