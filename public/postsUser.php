<?php

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("El ID no es válido.");
}

$id = $_GET['id'];

$userDao = new UserDao($pdo);
$user = $userDao->get($id);

if (!$user) {
    die('Usuario no encontrado');
}

$postDao = new PostDao($pdo);
$posts = $postDao->getByUser($user->getId());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Artículos</h1>
    <h2>Usuario: <?= $user->getName(); ?></h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($posts as $post) {
                    echo "<tr>";
                    printf("<td><a href=\"post.php?id=%s\">%s</a></td>", $post->getId(), $post->getId());
                    printf("<td>%s</td>", $post->getTitle());
                    echo "</tr>";
                }

            ?>
        </tbody>
    </table>
</body>
</html>