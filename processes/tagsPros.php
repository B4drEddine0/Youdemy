<?php
require_once '../classes/tags.php';

if (isset($_POST['addTag'])) {
    $tag = new Tag();
    $tags = array_map('trim', explode(',', $_POST['tags']));
    $tags = array_filter($tags);
    
    foreach ($tags as $tagName) {
        $tag->addTag($tagName);
    }
    
    header('Location: ../views/dashboard-admin.php');
    exit;
}

if (isset($_POST['tagId'])) {
    $tag = new Tag();
    $tag->deleteTag($_POST['tagId']);
    
    header('Location: ../views/dashboard-admin.php');
    exit;
}

?>