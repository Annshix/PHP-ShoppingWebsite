<?php

$view = new stdClass();
require_once('acp_check.php');
$view->pageTitle = 'Edit Item';
require_once('models/class.itemTable.php');
require_once('models/class.fileupload.php');
$view->uploadMessage = '';
$view->editMessage = '';
$id = htmlentities($_GET['id']);
$_POST['item_id'] = $id;
$database = new ItemTable();
$view->item = $database->fetchByPrimaryKey($id);

//Editing Item
if (isset($_POST['edit'])) {
     if (isset($_FILES['image'])) {
        $fileupload = new Fileupload($_FILES['image']);
        $result = $fileupload->upload();
        if (!$result) {
            $view->uploadMessage = 'Error uploading file.';
        $_POST['image'] = $view->item['image'];
        } else {
            $view->uploadMessage = $fileupload->getFilename() . ' has been uploaded.';
        $_POST['image'] = $_FILES['image']['name'];
        }
    } else {
        $_POST['image'] = $view->item['image'];
    }
    $database->edittbl($_POST);
    $view->item = $database->fetchByPrimaryKey($id);
}

//Deleting Item
if (isset($_POST['delete'])) {
    $database->deletetbl($_POST);  
    header('location: acp_manageitem.php');    
}
require_once('views/acp_edititem.phtml');
?>
