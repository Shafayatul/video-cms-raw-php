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
    public function totalPage(){
        $no_of_records_per_page = 6;
        $total_pages_sql = "SELECT COUNT(*) FROM $this->table_name";
        $result = mysqli_query($this->connection,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        return $total_pages = ceil($total_rows / $no_of_records_per_page);
        
    }
    public function addClasses($class_name,$category_name,$instructor_name,$class_img,$class_date_time,$classdescription){
        date_default_timezone_set('Asia/Dhaka');
        $datetime = date('Y-m-d H:i:s');
        if($class_img){
            $file = $_FILES['class_img']['tmp_name'];
            $image = addslashes(file_get_contents($_FILES['class_img']['tmp_name']));
            $image_name = addslashes($_FILES['class_img']['name']);
            $extension = strtolower($image_name);
            // print_r($extension);exit;
            $image_name_next = uniqid().'.'.$extension;
            $image_size = getimagesize($_FILES['class_img']['tmp_name']);
            if($image_size==false){
                echo 'This is not a image';
            }else{		
                if(move_uploaded_file($_FILES['class_img']["tmp_name"],"../uploads/class/" . $_FILES['class_img']["name"])){
    
                    rename("../uploads/class/$image_name","../uploads/class/$image_name_next");
                    $sql = "INSERT INTO $this->table_name (`class_name`, `instructor_id`, `category_id`, `class_img`,`class_description`, `date_time`, `created_at` ) 
                    VALUES ('$class_name','$instructor_name','$category_name','$image_name_next' ,'$classdescription', '$class_date_time','$datetime')";
                    $result1 = mysqli_query($this->connection, $sql);
                    return $result1;
                  
                }
                else{
                    echo 'Error: Image not uploaded in folder';
                }
                
                
            }
        }
        $sql = "INSERT INTO $this->table_name (`class_name`, `instructor_id`, `category_id`, `class_description`, `date_time`, `created_at` ) 
        VALUES ('$class_name','$instructor_name','$category_name','$classdescription', '$class_date_time','$datetime')";
        return $result = mysqli_query($this->connection, $sql);
    }
    public function viewClasses(){
        $sql = "SELECT * FROM $this->table_name";
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }
    public function viewClassesPaginate($page=1){

        $no_of_records_per_page = 6;
        $offset = ($page-1) * $no_of_records_per_page; 

        $sql = "SELECT * FROM $this->table_name LIMIT $offset, $no_of_records_per_page";
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }

    public function getClasses($class_id){
        $sql = "SELECT * FROM $this->table_name WHERE id= $class_id";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

    public function updateClasses($class_name,$category_name,$instructor_name,$class_img,$class_date_time,$classdescription,$class_id){
        date_default_timezone_set('Asia/Dhaka');
        $datetime = date('Y-m-d H:i:s');
        if($class_img){
            $file = $_FILES['class_img']['tmp_name'];
            $image = addslashes(file_get_contents($_FILES['class_img']['tmp_name']));
            $image_name = addslashes($_FILES['class_img']['name']);
            $extension =  strtolower($image_name);
            // print_r($extension);exit;
            $image_name_next = uniqid().'.'.$extension;
            $image_size = getimagesize($_FILES['class_img']['tmp_name']);
            if($image_size==false){
                echo 'This is not a image';
            }else{		
                if(move_uploaded_file($_FILES['class_img']["tmp_name"],"../uploads/class/" . $_FILES['class_img']["name"])){
    
                    rename("../uploads/class/$image_name","../uploads/class/$image_name_next");
                    $sql = "UPDATE $this->table_name SET class_name='$class_name', instructor_id='$instructor_name',category_id='$category_name',class_img='$image_name_next', class_description='$classdescription',date_time='$class_date_time', updated_at = '$datetime' WHERE id =$class_id";
                    // print_r($sql);exit;
                    $result = mysqli_query($this->connection, $sql);
                    return $result;
                  
                }
                else{
                    echo 'Error: Image not uploaded in folder';
                }
                
                
            }
        }else{
            $sql = "UPDATE $this->table_name SET class_name='$class_name', instructor_id='$instructor_name',category_id='$category_name',class_img='$class_img', class_description='$classdescription',date_time='$class_date_time', updated_at = '$datetime' WHERE id =$class_id";
            // print_r($sql);exit;
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
    }
    public function ClassDelete($class_id){
        $sql = "DELETE FROM $this->table_name WHERE id=$class_id";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

}
?>