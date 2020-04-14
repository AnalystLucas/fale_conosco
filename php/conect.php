<?php 
require_once "config.php";

class Conect extends Config{

    public function conect(){
        $conn = new mysqli($this->host, $this->user, $this->password, $this->bd);
        
        if($conn == true){
            return $conn;
        }    
    }
}