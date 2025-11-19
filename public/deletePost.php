<?php

use Dsw\Blog\DAO\PostDao;

require_once '../bootstrap.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("El ID no es válido.");
}


$id = $_GET['id'];

$postDao = new PostDao($pdo);
$post = $postDao->delete($id);

header('Location: posts.php');
exit();
?>