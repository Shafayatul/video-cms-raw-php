<?php
ob_start();
include('includes/header.php');
include('../class/Classes.php');
$db = $database->getConnection();
$category = new Classes($db);
$class_id = $_GET['id'];
$delete = $category->ClassDelete($class_id);
// print_r($delete);exit;
if($delete){
     $msg = "Class Deleted Successfully";
     header('location: classlist.php');exit;
}
else{
    echo "something wrong";
}
?>