<?php
$view = new stdClass();
require_once('models/class.cookies.php');
$view->pageTitle = 'Logout';
$cookie = new Cookies();
$cookie->deleteCookie('login');
$cookie->deleteCookie('cart');

require_once('views/logout.phtml');
?>