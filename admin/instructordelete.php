<?php
ob_start();
include('includes/header.php');
include('../class/Instractor.php');
$db = $database->getConnection();
$instructor = new Instructor($db);
$instructor_id = $_GET['id'];
$delete = $instructor->deleteInstructor($instructor_id);
// print_r($delete);exit;
if($delete){
     $msg = "Data Deleted Successfully";
     header('location: instructorlist.php');exit;
}
else{
    echo "something wrong";
}
?>