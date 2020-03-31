<?php
include '../class/database.php';
include '../class/User.php';
$database = new Database();
$db = $database->getConnection();

$result = new User($db);
$user = $result->getUser();

while( $row = mysqli_fetch_assoc($user)){
    echo $row['name'];
}

?>