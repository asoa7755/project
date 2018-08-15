<?php
    session_start();
    session_destroy();
    header('Location: /ticketsystem/application/index.php');
    die();
?>