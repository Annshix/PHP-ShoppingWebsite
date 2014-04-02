<?php

$view = new stdClass();
require_once('acp_check.php');
$view->pageTitle = 'Add Item';
$view->uploadMessage = '';
$view->addMessage = '';
require_once('models/class.itemTable.php');
require_once('models/class.fileupload.php');
if (isset($_POST['submit'])) {
    if (isset($_FILES['image'])) {
        $fileupload = new Fileupload($_FILES['image']);
        $result = $fileupload->upload();
        if (!$result) {
            $view->uploadMessage = 'Error uploading file.';
        $_POST['image'] = 'null';
        } else {
            $view->uploadMessage = $fileupload->getFilename() . ' has been uploaded.';
        $_POST['image'] = $_FILES['image']['name'];
        }
    } else {
        $_POST['image'] = 'null';
    }
    $view->addMessage = 'Your item has been added to the system successfully.';
    $database = new ItemTable();
    $database->inserttbl($_POST);
}
require_once('views/acp_additem.phtml');
?>
