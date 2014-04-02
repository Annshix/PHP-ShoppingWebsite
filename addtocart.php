<?php

require_once('models/class.cookies.php');
$view = new stdClass();
$view->cookie = new Cookies();
$list = $view->cookie->getCookie('cart');

$id = htmlentities($_GET['id']);
$list = $list . $id . ',';
$view->cookie->setCookie('cart', $list);

header('location: cart.php');
?>

