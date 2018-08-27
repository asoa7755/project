<h1>The Session has expired...</h1>
<?php
    session_start();
    session_destroy();
    die();
?>