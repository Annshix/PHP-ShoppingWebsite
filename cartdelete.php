<?php

require_once('models/class.cookies.php');
$view = new stdClass();
$view->cookie = new Cookies();
$list = $view->cookie->getCookie('cart');

$id = htmlentities($_GET['id']);
$sub = strpos($list, $id . ',');
$list = substr_replace($list, '', $sub, 3);
if ($list == '') {
    $list = ',';
}
$view->cookie->setCookie('cart', $list);

header('location: cart.php');
?>