<?php

require_once('models/class.cookies.php');
$view->cookie = new Cookies();
$view->logged = false;
if ($view->cookie->getCookie('login') != false) {
    $view->logged = true;
}

require_once('views/header.phtml');
?>
