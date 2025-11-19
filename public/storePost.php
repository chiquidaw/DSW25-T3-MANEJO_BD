<?php
// Crear un post

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\Models\Post;

require_once '../bootstrap.php';

if (isset($_GET['user_id'],$_POST['title'], $_POST['body'])) {
    $post = new Post(null, $_POST['title'], $_POST['body'], null, $_GET['user_id']);

    $postDao = new PostDao($pdo);
    $postDao->create($post);
}

header('Location: posts.php');
exit();
?>