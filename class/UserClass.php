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
        $hash = md5($userpass); 
        $sql = "INSERT INTO `users`(`name`, `email`, `password`,`password_reset`, `type`, `created_at`, `updated_at`) VALUES ('$username', '$useremail', '$hash','', 2,'','')";
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
    public function viewUserinfo($id=null)
		{
			$sql = "SELECT * FROM users";
			if($id){ $sql .= " WHERE id=$id";}
			// print_r($sql);
			$result = mysqli_query($this->connection,$sql);
			return $result;
		}

    public function loginuser($useremail,$userpass){
        $userpass = md5($userpass);
        // print_r($userpass);
        $sql = "SELECT id FROM users WHERE password= '$userpass' and email = '$useremail'";
        // $sql = "SELECT * FROM usres";
        // echo "<pre>";
        // print_r($sql);exit;
        $result = mysqli_query($this->connection, $sql);
        // echo "<pre>";
        // print_r($result);exit;
        $user = mysqli_fetch_array($result);
        $count_row = $result->num_rows;
        // echo "<pre>";
        // print_r($count_row);exit;
        
        if($count_row == 1){
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            return true;
        }
        else {
            return false;
        }
        
        // if(mysqli_num_rows($result) > 0)  
        //    {  
        //         while($row = mysqli_fetch_array($result))  
        //         {  
        //              if(password_verify($userpass, $row["password"]))  
        //              {  
        //                   //return true;  
        //                   $_SESSION["email"] = $useremail;  
        //                   header("location:admin/dashboard.php");  
        //              }  
        //              else  
        //              {  
        //                   //return false;  
        //                   echo '<script>alert("Wrong User Details")</script>';  
        //              }  
        //         }  
        //    }  
        //    else  
        //    {  
        //         echo '<script>alert("Wrong User Details")</script>';  
        //    }  
    }
    public function get_session(){
        return $_SESSION['login'];
    }
}
?>