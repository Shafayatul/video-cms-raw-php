<?php
ob_start();
include('includes/header.php');
include('../class/Category.php');
$db = $database->getConnection();
$category = new Category($db);
$category_id = $_GET['id'];
$delete = $category->delete($category_id);
// print_r($delete);exit;
if($delete){
     $msg = "Data Deleted Successfully";
     header('location: category.php');exit;
}
else{
    echo "something wrong";
}
?>