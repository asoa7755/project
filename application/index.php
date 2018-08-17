<?php 
    include_once('../application/views/shared/_headerview.php');
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
     
?>

<div class="jumbotron">
    <h1> Ticketing System </h1>
    <p>The Ticket Management System integrates all the tools necessary to ensure prompt and seamless resolution of customer inquiries. The more you automate, the more your service reps can focus on what is important – creating exceptional customer relationships.</p>
    <p>Our help desk ticketing system enables you to automate processes that are best managed through system driven resources, so your service team can focus on engaging customers and helping them get the most out of your product. </p>
</div>

<?php include_once('../application/views/shared/_footerview.php') ?>

