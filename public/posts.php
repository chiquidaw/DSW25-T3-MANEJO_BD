<?php

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

$postDao = new PostDao($pdo);
$posts = $postDao->getAll();

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
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $userDao = new UserDao($pdo);
                foreach ($posts as $post) {
                    $userId = $post->getUserId();
                    $user = $userDao->get($userId);
                    echo "<tr>";
                    printf("<td><a href=\"post.php?id=%s\">%s</a></td>", $post->getId(), $post->getId());
                    printf("<td>%s</td>", $post->getTitle());
                    printf("<td>%s</td>", $user->getName());
                    echo "</tr>";
                }

            ?>
        </tbody>
    </table>
</body>
</html>