<?php
class DbConfig 
{    
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = 'ghDS67:45';
    private $_database = 'ticketsystem';


    protected $connection;
    
    function __construct()
    {
        if (!isset($this->connection)) {

            $mysqli = new mysqli("localhost","root","ghDS67:45","ticketsystem");
            //Verbindung überprüfen
            if ($mysqli -> connect_errno)
            {
              printf("Verbindung fehlgeschlagen: %s\n", $mysqli->connect_error);
              exit();
            }

            $this->connection = $mysqli;
            
            /*mysqli_connect( $hostname, $username, $password ) or die( "Unable to connect to MySQL" );

            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            } */           
        }    
        
        return $this->connection;
    }
}
?>