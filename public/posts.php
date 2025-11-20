<?php

use Dsw\Blog\DAO\PostDao;
use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

$postDao = new PostDao($pdo);
$posts = $postDao->getAll();

$titulo = "Lista de Artículos";
include '../includes/header.php';
?>
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
                    printf("<td><a href=\"post.php?id=%s\">%s</a></td>", $post->getId(), $post->getTitle());
                    printf("<td>%s</td>", $user->getName());
                    echo "</tr>";
                }

            ?>
        </tbody>
    </table>
<?php
include '../includes/footer.php';
?>