<?php
$view = new stdClass();
require_once('acp_check.php');
$view->pageTitle = 'Manage Items';
$view->itemList = array();
require_once('models/class.itemTable.php');
$database = new ItemTable();
$view->itemList = $database->fetchAllItems();    
require_once('views/acp_manageitem.phtml');
?>
