<?php
Class User{
    public $table_name = "users";
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

    public function adduser($username,$useremail,$userpass){
        // print_r($useremail);exit;
        $hash = password_hash($userpass, PASSWORD_DEFAULT); 
        $sql = "INSERT INTO `users`(`name`, `email`, `password`,`password_reset`, `type`) VALUES ('$username', '$useremail', '$hash','', 2)";
        // print_r($sql);exit;
        
        $result = mysqli_query($this->connection,$sql);
        // print_r($result);exit;
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function getUser(){
        $result = "SELECT * FROM users";
        $result = mysqli_query($this->connection, $result);
        return $result;
    }

    public function loginuser($useremail,$userpass){
        
        $result = "SELECT * FROM users WHERE email= '$useremail'";
        // echo "<pre>";
        // print_r($result);exit;
        $result = mysqli_query($this->connection, $result);
        
        if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($userpass, $row["password"]))  
                     {  
                          //return true;  
                          $_SESSION["email"] = $useremail;  
                          header("location:admin/dashboard.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
    }
}
?>