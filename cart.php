<?php

$view = new stdClass();
require_once('models/class.itemTable.php');
require_once('models/class.cookies.php');
$view->pageTitle = 'Shopping Cart';
$cookie = new Cookies();
$list = $cookie->getCookie('cart');
$list = trim($list, ',');
$list = explode(',', $list);
$database = new ItemTable();
$view->cart = array();
foreach ($list as $id) {
    $item = $database->fetchByPrimaryKey($id);
    $view->cart[] = $item;
}
require('views/cart.phtml');
?>