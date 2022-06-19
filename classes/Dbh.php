<?php

class Dbh   {

     private $hostname = "localhost";  
     private $username = "root"; 
     private $password = ""; 
     private $dbname = "Zuriphp";
    
    protected function connect(){
            
        $conn = new mysqli($this -> hostname, $this -> username, $this -> password, $this->dbname);

        return $conn;
    }    

}
