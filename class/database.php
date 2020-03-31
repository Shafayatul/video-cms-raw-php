<?php
class Database {
    public $connection;
    
    public function getConnection(){
        $this->connection = null;
        $this->connection = mysqli_connect('localhost','root','','video-cms');
        if(!$this->connection){
            die("Database Connection Failded". mysqli_connect_error().mysqli_connect_errno());
        }
        return $this->connection;
    }

}

?>