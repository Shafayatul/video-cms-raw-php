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
    public function addCategory($categoryname,$categoryslug,$category_img){
        date_default_timezone_set('Asia/Dhaka');
        $datetime = date('Y-m-d H:i:s');
        if($category_img){
            $file = $_FILES['category_img']['tmp_name'];
            $image = addslashes(file_get_contents($_FILES['category_img']['tmp_name']));
            $image_name = addslashes($_FILES['category_img']['name']);
            $extension = strtolower($image_name);
            // print_r($extension);exit;
            $image_name_next = uniqid().'.'.$extension;
            $image_size = getimagesize($_FILES['category_img']['tmp_name']);
            if($image_size==false){
                echo 'This is not a image';
            }else{		
                if(move_uploaded_file($_FILES['category_img']["tmp_name"],"../uploads/category/" . $_FILES['category_img']["name"])){
    
                    rename("../uploads/category/$image_name","../uploads/category/$image_name_next");
                  
                }
                else{
                    echo 'Error: Image not uploaded in folder';
                }
                
                
            }
        }
        $category= "SELECT * FROM $this->table_name WHERE category_name='$categoryname' and category_slug='$categoryslug'";
        $result = mysqli_query($this->connection, $category);
        if(mysqli_num_rows($result) > 0){
            $msg = "Category Already Exist";
        }else{
            $sql = "INSERT INTO $this->table_name (category_name, category_slug, category_img, created_at) VALUES ('$categoryname', '$categoryslug', '$image_name_next', '$datetime')";
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
    public function updateCategory($categoryname,$categoryslug,$category_img,$category_id){
        date_default_timezone_set('Asia/Dhaka');
        $datetime = date('Y-m-d H:i:s');
        if($category_img){
            $file = $_FILES['category_img']['tmp_name'];
            $image = addslashes(file_get_contents($_FILES['category_img']['tmp_name']));
            $image_name = addslashes($_FILES['category_img']['name']);
            $extension = strtolower($image_name);
            // print_r($extension);exit;
            $image_name_next = uniqid().'.'.$extension;
            $image_size = getimagesize($_FILES['category_img']['tmp_name']);
            if($image_size==false){
                echo 'This is not a image';
            }else{		
                if(move_uploaded_file($_FILES['category_img']["tmp_name"],"../uploads/category/" . $_FILES['category_img']["name"])){
    
                    rename("../uploads/category/$image_name","../uploads/category/$image_name_next");
                    $sql = "UPDATE $this->table_name SET category_name= '$categoryname', category_slug= '$categoryslug', category_img ='$image_name_next', updated_at='$datetime' WHERE id=$category_id";
                    // print_r($sql);exit;
                    $result1 = mysqli_query($this->connection, $sql);
                    return $result1;
                  
                }
                else{
                    echo 'Error: Image not uploaded in folder';
                }
                
                
            }
        }
     
    }

    public function delete($id){

        $sql = "SELECT * FROM $this->table_name WHERE id='$id'";
        $result1 = mysqli_query($this->connection, $sql);
        while ( $row = mysqli_fetch_assoc($result1) )
        {
            if (file_exists(("../uploads/category/".$row['category_img']))) {
               unlink("../uploads/category/".$row['category_img']);
            }
        } 

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