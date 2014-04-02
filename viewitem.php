<?php
$view = new stdClass();
require_once('models/class.itemTable.php');
$id = htmlentities($_GET['id']);
$_POST['item_id'] = $id;
$database = new ItemTable();
$view->item = $database->fetchByPrimaryKey($id);
$view->pageTitle = $view->item['name'];
require_once('views/viewitem.phtml');
?>
