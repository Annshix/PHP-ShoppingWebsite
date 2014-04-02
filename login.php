<?php

$view = new stdClass();
$view->pageTitle = 'Login & Register';
require_once('models/class.memberTable.php');
require_once('models/class.cookies.php');
$database = new MemberTable();
$view->loginMessage = '';
$view->registerMessage = '';
require_once('views/login.phtml');

//Login Section
if (isset($_POST['login'])) {
    $_POST['email'] = htmlentities($_POST['email']);
    $user = $database->fetchByEmail($_POST['email']);
    if ($user == false) {
        $view->loginMessage = "Error: Couldn't find email address.";
    } else {
        if (md5(htmlentities($_POST['password'])) == htmlentities($user['password'])) {
            $view->cookie->setCookie('login', $user['member_id']);
            $list = "";
            //$list = array();
            $view->cookie->setCookie('cart', $list);
            header('location: index.php');
        } else {
            $view->loginMessage = "Error: Incorrect password.";
        }
    }
}

//Register Section
if (isset($_POST['register'])) {
    $_POST['forename'] = htmlentities($_POST['forename']);
    $_POST['surname'] = htmlentities($_POST['surname']);
    $_POST['email'] = htmlentities($_POST['email']);
    $check = $database->fetchByEmail($_POST['email']);
    if ($check == false) {
        $_POST['password'] = md5(htmlentities($_POST['password']));
        $database->inserttbl($_POST);
        $view->registerMessage = 'You have been registered and may now log in with your email and password';
    } else {
        $view->registerMessage = 'Error: The email address provided is already on the system.';
    }
}

?>
