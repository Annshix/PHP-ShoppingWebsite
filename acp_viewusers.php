<?php
$view = new stdClass();
require_once('acp_check.php');
$view->pageTitle = 'View Users';
$view->userList = array();
require_once('models/class.memberTable.php');
$database = new MemberTable();
$view->userList = $database->fetchAllMembers();    
require_once('views/acp_viewusers.phtml');
?>
