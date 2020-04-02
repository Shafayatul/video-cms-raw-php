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
    public function addClasses($class_name,$category_name,$instructor_name,$class_date_time,$classdescription){
        date_default_timezone_set('Asia/Dhaka');
        $datetime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO $this->table_name (`class_name`, `instructor_id`, `category_id`, `class_description`, `date_time`, `created_at` ) 
        VALUES ('$class_name','$instructor_name','$category_name','$classdescription', '$class_date_time','$datetime')";
        return $result = mysqli_query($this->connection, $sql);
    }
    public function viewClasses(){
        $sql = "SELECT * FROM $this->table_name";
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }

}
?>