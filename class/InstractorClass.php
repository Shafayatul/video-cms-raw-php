<?php
class InstructorClass{
    public $table_name = 'instructor';
    public $connection;
    
    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function sanitize($var){
        $result = mysqli_real_escape_string($this->connection,$var);
        return $result;
    }

    public function addInstructor($instructorname,$instructorgender){
        date_default_timezone_set('Asia/Dhaka');
        $datetime = date('Y-m-d H:i:s');
        // print_r($instructorname);exit;
        $sql = "INSERT INTO instructor (instructor_name , gender, created_at ) VALUES ('$instructorname','$instructorgender','$datetime')";
        // print_r($sql);exit;
        $result = mysqli_query($this->connection,$sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function getInstructor(){
        $sql = "SELECT * FROM instructor";
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }
}
?>