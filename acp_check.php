<?php
require_once('models/class.sessions.php');
$session = new Session();
if($session->getSession('adminlog') == false) {    
    header('location: admin.php');    
}
?>
