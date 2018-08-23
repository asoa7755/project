<?php
include_once('Repository.php');
include_once('../../interfaces/IFileService.php');

class FileService extends Repository implements IFileService
{
    public function getFilesperticketid($ticketid)
    {
        $result = $this->getData("SELECT ID,Name FROM FILES WHERE TICKETID=".$ticketid);

        return $result;
    }

    public function getMimetypes()
    {   
        return "image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
    }

    public function getDefaultfilesize()
    {   
        return 2097152;
    }

    public function getFileBlob($id, $staffid)
    {
        $result = $this->getData('SELECT FILES.FILE,FILES.NAME, FILES.EXTENSION FROM FILES, USERS,TICKETS WHERE ID='.$id. ' AND USERS.ROLE=2 AND (TICKETS.SourceTicketId=0 OR TICKETS.SourceTicketId='. $staffid . ') AND USERS.ID= TICKETS.USERID AND TICKETS.ID= FILES.TICKETID');

        return $result;
    }
       

}
