<?php

$view = new stdClass();
require_once('models/class.itemTable.php');
require_once('models/class.item.php');
$category = htmlentities($_GET['cat']);
$view->pageTitle = 'phones';
$database = new ItemTable();
switch ($category) {
    case 0:
        $category = "Android";
        break;
    case 1:
        $category = "Windows Phone 7";
        break;
    case 2:
        $category = "Blackberry";
        break;
    case 3:
        $category = "WebOS";
        break;
    default:
        unset($category);
}
if (isset($category)) {
    $view->list = $database->fetchByCategory($category);
    $view->pageTitle = $category . ' phones';
    $view->category = $category;
}  
require_once('views/category.phtml');
?>