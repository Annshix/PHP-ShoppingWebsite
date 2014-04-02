<?php

$view = new stdClass();
$view->pageTitle = 'Purchased Items';
require_once('models/class.itemTable.php');
require_once('models/class.cookies.php');
$cookie = new Cookies();
$list = $cookie->getCookie('cart');
$list = trim($list, ',');
$list = explode(',', $list);
$database = new ItemTable();
$view->purchased = array();
foreach ($list as $id) {
    $item = $database->fetchByPrimaryKey($id);
    $view->purchased[] = $item;
}
require('views/purchase.phtml');
$view->cookie->setCookie('cart', ',');
?>
