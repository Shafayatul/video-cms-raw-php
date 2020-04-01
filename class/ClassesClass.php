<?php
class Classes{
    public $table_name = "classes";
    public $connection;

    public function __construct($db)
    {
        // print_r($db);exit;
        $this->connection = $db;
    }

    public function sanitize($var){
        $result = mysqli_real_escape_string($this->connection,$var);
        return $result;
        
    }
    public function addClasses(){
        
    }
}
?>