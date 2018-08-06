<?php
require 'classes/UserService.php';

$userservice= new UserService();
$user="";

if (isset($webdata['user']))
{
    $webdata['user'];
}
else
{   
    header("Location: views/loginview.php");
    die();
}

$user=$webdata['user'];

echo "Login:" + $user["Email"];

?>