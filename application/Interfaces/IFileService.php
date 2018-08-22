<?php
interface IFileService{
    //It retrieves all the files from a ticket
    public function getFilesperticketid($ticketid);

    //It gets the default mime types
    public function getMimetypes();

    //It gets the default size for files
    public function getDefaultfilesize();
}

?>
