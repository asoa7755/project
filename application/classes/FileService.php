<?php
include_once('Repository.php');
include_once('../../interfaces/IFileService.php');

class FileService extends Repository implements IFileService
{
    public function getFilesperticketid($ticketid)
    {
        $result = $this->getData("SELECT ID, CAST(BINARY(Name) AS CHAR CHARACTER SET utf8)  FROM FILES WHERE TICKETID=".$ticketid);

        return $result;
    }

    public function getMimetypes()
    {   
        return "image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
    }

    public function getMimetypebyextension($extension)
    {
        switch($extension)
        {
            case 'txt':return 'text/plain';
            case 'rdp':return 'application/octet-stream';
            case 'pdf':return 'application/pdf';
            case 'jpg':return 'image/jpeg';
            case 'gif':return 'image/gif';
            case 'png':return 'image/png';
            case 'webm':return 'video/webm';
            case 'doc':return 'application/msword';
            case 'docx':return 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'; 
            case 'xls':return 'application/vnd.ms-excel';
            case 'xlsx':return 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            default: return 'application/octet-stream';
        }
    }

    public function getDefaultfilesize()
    {   
        return 2097152;
    }

    public function getFileBlob($id, $staffid)
    {
        //echo 'SELECT FILES.FILE,FILES.NAME, FILES.EXTENSION FROM FILES,TICKETS WHERE FILES.ID='.$id. ' AND TICKETS.ID= FILES.TICKETID AND (TICKETS.SourceTicketId=0 OR TICKETS.SourceTicketId='. $staffid .')';
        $result = $this->getData('SELECT FILES.FILE,FROM_BASE64(FILES.NAME), FILES.EXTENSION FROM FILES,TICKETS WHERE FILES.ID='.$id. ' AND TICKETS.ID= FILES.TICKETID AND (TICKETS.SourceTicketId=0 OR TICKETS.SourceTicketId='. $staffid .')');

        //$result = $this->getData('SELECT FILES.FILE,FILES.NAME, FILES.EXTENSION FROM FILES, USERS,TICKETS WHERE FILES.ID='.$id. ' AND USERS.ROLE=2 AND (TICKETS.SourceTicketId=0 OR TICKETS.SourceTicketId='. $staffid . ') AND USERS.ID= TICKETS.USERID AND TICKETS.ID= FILES.TICKETID');

        return $result;
    }
       

}
