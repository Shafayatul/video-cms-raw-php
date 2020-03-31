<?php 
include '../class/dbc.inc.php';
include '../class/User.inc.php';
$category = new User();
$category->getCategory();
foreach($category as $category)
{
    echo $category['category_name'];
}
?>

