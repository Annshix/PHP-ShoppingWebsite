<?php
$view = new stdClass();
$view->pageTitle = 'Logout';
require_once('models/class.sessions.php');

$session = new Session();
$session->deleteSession('adminlog');

require_once('views/acp_logout.phtml');
?>
