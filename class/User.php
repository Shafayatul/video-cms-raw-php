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

    public function updateProfile($name, $email, $gender, $birthday, $country, $city, $reasonForRegistration){
        $sql = "UPDATE `users` SET name = '$name', email = '$email', gender = '$gender', birthday = '$birthday', country = '$country', city = '$city', reasonForRegistration = '$reasonForRegistration' WHERE id='".$_SESSION['id']."'";
        $result = mysqli_query($this->connection,$sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function updatePassword($currentPassword, $newPassword){
        $currentPassword = md5($currentPassword);
        $sql = "SELECT * FROM `users`  WHERE password='$currentPassword' AND id='".$_SESSION['id']."'";
        $result = mysqli_query($this->connection,$sql);
        $count_row = $result->num_rows;
        if($count_row == 1){
            $newPassword = md5($newPassword);
            $sql = "UPDATE `users` SET password = '$newPassword' WHERE id='".$_SESSION['id']."'";
            $result = mysqli_query($this->connection,$sql);
            if($result){
                return true;
            }
            else{
                return false;
            }
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
    public function getCurrentUser(){
        $sql = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }
    public function loginuser($useremail,$userpass){
        $userpass = md5($userpass);
        $sql = "SELECT * FROM users WHERE password= '$userpass' and email = '$useremail'";
        $result = mysqli_query($this->connection, $sql);
        $user = mysqli_fetch_array($result);
        $count_row = $result->num_rows;
        if($count_row == 1){
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['type'] = $user['type'];
            return true;
        }
        else {
            return false;
        }
    }
    public function get_session(){
        return $_SESSION['login'];
    }

    public function addPublicUser($user_number,$user_password){
        // die(1111);
        date_default_timezone_set('Asia/Dhaka');
        $datetime = date('Y-m-d H:i:s');
        $password = md5($user_password); 
        $users= "SELECT * FROM $this->table_name WHERE email='$user_number'";
        // print_r($get_user);exit;
        $user_result = mysqli_query($this->connection, $users);  
        if(mysqli_num_rows($user_result) > 0){
            $msg = "Category Already Exist";
        }else{
            $sql = "INSERT INTO `users`( `email`, `password`, `type`, `created_at`) VALUES ('$user_number', '$password', 1,'$datetime')";
            // print_r($sql);exit;
            
            $result = mysqli_query($this->connection,$sql);
            // print_r($result);exit;
            return $result;
        }
        
    }
    public function loginpublicUser($loginInput,$loginPassword){
        $userpass = md5($loginPassword);
        $sql = "SELECT id FROM users WHERE password= '$userpass' and email = '$loginInput'";
        $result = mysqli_query($this->connection, $sql);
        $user = mysqli_fetch_array($result);
        $count_row = $result->num_rows;
        if($count_row == 1){
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            return true;
        }
        else {
            return false;
        }
    }

}
?>