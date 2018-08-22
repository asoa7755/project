<?php
include_once('Repository.php');
include_once('../../interfaces/IFileService.php');

class FileService extends Repository implements IFileService
{
    public function getFilesperticketid($ticketid)
    {
        $result = $this->getData("SELECT * FROM FILES WHERE TICKETID=".$ticketid);

        return $result;
    }

    public function getMimetypes()
    {
        return "image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
        /*return "image/png, 
                image/jpeg, 
                image/gif, 
                image/jpg, 
                application/pdf, 
                application/msword, 
                application/docx, 
                application/vnd.openxmlformats-officedocument.wordprocessingml.document, 
                application/vnd.openxmlformats-officedocument.wordprocessingml.template,
                application/vnd.ms-excel,
                application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,
                application/vnd.openxmlformats-officedocument.presentationml.presentation,
                application/vnd.ms-powerpoint";*/
    }

    public function getDefaultfilesize()
    {   
        return 2097152;
    }
}
