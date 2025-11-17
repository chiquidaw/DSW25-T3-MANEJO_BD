<?php

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("El ID no es válido.");
}


$id = $_GET['id'];

$postDao = new PostDao($pdo);
$post = $postDao->get($id);

if (!$post) {
    die('Artículo no existe');
}

$userId = $post->getUserId();
$userDao = new UserDao($pdo);
$user = $userDao->get($userId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <h1><?= $post->getTitle() ?></h1>
    <p><?= $post->getBody() ?></p>
    <h3><?= $user->getName() ?></h3>
</body>
</html>
