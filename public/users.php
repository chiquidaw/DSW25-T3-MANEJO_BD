<?php

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

$userDao = new UserDao($pdo);
$users = $userDao->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de usuarios</h1>
    <p>
        <a href="create.php">Crear nuevo usuario</a>
    </p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha registro</th>
                <th>Número artículos</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $postDao = new PostDao($pdo);
                foreach ($users as $user) {
                    $posts = $postDao->getByUser($user->getId());
                    echo "<tr>";
                    printf("<td><a href=\"user.php?id=%s\">%s</a></td>", $user->getId(), $user->getId());
                    printf("<td>%s</td>", $user->getName());
                    printf("<td>%s</td>", $user->getEmail());
                    printf("<td>%s</td>", $user->getRegisterDate()->format('d-m-Y'));
                    printf("<td><a href=\"postsUser.php?id=%s\">%s</td>", $user->getId(), count($posts));
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>