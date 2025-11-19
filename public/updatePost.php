<?php
// Modificar un articulo

use Dsw\Blog\DAO\PostDao;

require_once '../bootstrap.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("El ID no es válido.");
}

$id = $_GET['id'];

if(isset($_POST['title'], $_POST['body'], $_POST['user_id'])) {
    $postDao = new PostDao($pdo);

    // Obtengo el articulo:
    $post = $postDao->get($id);

    // Modifico los datos:
    $post->setTitle($_POST['title']);
    $post->setBody($_POST['body']);
    $post->setUserId($_POST['user_id']);

    // Guardo el articulo:
    $postDao->update($post);
}

header('Location: posts.php');
exit();
?>