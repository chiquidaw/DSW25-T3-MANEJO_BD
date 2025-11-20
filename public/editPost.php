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
    die("Artículo no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Artículo</h1>
    <form action="updatePost.php?id=<?= $id ?>" method="post">
        <p>
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" required value="<?= $post->getTitle() ?>">
        </p>
        <p>
            <label for="body">Contenido:</label>
            <textarea name="body" id="body"><?= $post->getBody() ?></textarea>
        </p>
        <p>
            <label for="user">Usuario: </label>
            <select name="user_id" id="user">
                <?php
                    $userDao = new UserDao($pdo);
                    $users = $userDao->getAll();

                    foreach ($users as $user) {
                        $autor = $user->getId() === $post->getUserId() ? 'selected' : ''; // Si tiene la misma id, coloca el selected en el campo que cree, sino no.
                        printf('<option value="%s" %s>%s</option>', $user->getId(), $autor, $user->getName());
                    }
                ?>
            </select>
        </p>
        <p>
            <button type="submit">Editar</button>
        </p>
    </form>
</body>
</html>