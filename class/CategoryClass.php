<?php
class Category{
    public $table_name = "category";
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
    public function addCategory($categoryname,$categoryslug){
        date_default_timezone_set('Asia/Dhaka');
        $datetime = date('Y-m-d H:i:s');
        $category= "SELECT * FROM $this->table_name WHERE category_name='$categoryname' and category_slug='$categoryslug'";
        $result = mysqli_query($this->connection, $category);
        if(mysqli_num_rows($result) > 0){
            $msg = "Category Already Exist";
        }else{
            $sql = "INSERT INTO $this->table_name (category_name, category_slug, created_at) VALUES ('$categoryname', '$categoryslug', '$datetime')";
            // print_r($sql);exit;
            $result1 = mysqli_query($this->connection, $sql);
            return $result1;
        }
    }

    public function viewCategory(){
        $sql = "SELECT * FROM $this->table_name";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }
    
    public function getCategory($category_id){
        $sql = "SELECT * FROM $this->table_name WHERE id = $category_id";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }
    public function updateCategory($categoryname,$categoryslug,$category_id){
        date_default_timezone_set('Asia/Dhaka');
        $datetime = date('Y-m-d H:i:s');
        $category= "SELECT * FROM $this->table_name WHERE category_name='$categoryname' and category_slug='$categoryslug'";
        $result = mysqli_query($this->connection, $category);
        // print_r($result);exit;
        if(mysqli_num_rows($result) > 0){
            $msg = "Category Already Exist";
        }else{
            $sql = "UPDATE $this->table_name SET category_name= '$categoryname', category_slug= '$categoryslug', updated_at='$datetime' WHERE id=$category_id";
            // print_r($sql);exit;
            $result1 = mysqli_query($this->connection, $sql);
            return $result1;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table_name WHERE id=$id";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

    public function categoryArray(){
        $sql = "SELECT `id`, `category_name` FROM $this->table_name";
        $result = mysqli_query($this->connection,$sql);
        $data = [];
        while($row = mysqli_fetch_assoc($result)) {
            $data[$row['id']] = $row['category_name'];
        }
        return $data;
    }

}
?>