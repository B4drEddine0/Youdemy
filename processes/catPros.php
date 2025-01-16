<?php
require_once '../classes/categorie.php';

if (isset($_POST['addCat'])) {
    $cat = new Categorie();
    $cat->addCateg($_POST['name']);
    header('Location: ../views/dashboard-admin.php');
    exit;
}

if (isset($_POST['catId'])) {
    $cat = new Categorie();
    $cat->deleteCateg($_POST['catId']);
    
    header('Location: ../views/dashboard-admin.php');
    exit;
}

?>