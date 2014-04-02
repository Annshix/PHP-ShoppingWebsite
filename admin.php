<?php
$view = new stdClass();
$view->pageTitle = 'Admin Login';
require_once('models/class.sessions.php');

$session = new Session();
$error = false;

if ($session->getSession('adminlog')) {
		header('location: acp.php');    
}

if (isset($_POST['submit'])) {
	if ($_POST['password'] == "admin") {
		$session->setSession('adminlog', true);
		header('location: acp.php');
	}
        else {
            $error = true;
        }
}

require_once('views/admin.phtml');

?>