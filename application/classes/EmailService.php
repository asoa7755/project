<?php
class EmailService implements IEmailService
{    
    public function sendEmail($username,$from,$to,$subject,$body)
    {
        $headers = 'From: '. $from . "\r\n" .
        'Reply-To: '. $to . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $body, $headers);
    }
}
?>