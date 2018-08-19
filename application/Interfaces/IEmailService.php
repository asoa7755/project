<?php
interface IEmailService{
    //It sends an email
    public function sendEmail($username,$from,$to,$subject,$body);
}

?>
