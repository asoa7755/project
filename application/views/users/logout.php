<?php
    session_start();
    session_destroy();
    header("location:http://localhost/ticketsystem/index.html");
?>