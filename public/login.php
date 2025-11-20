<?php

use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['name'], $_POST['password'])) {
    $userDao = new UserDao($pdo);
    $user = $userDao->login($_POST['name'], $_POST['password']);

    if ($user) {
        $_SESSION['user_id'] = $user->getId();
        header('Location: /');
        exit();
    } else {
        $error = "Error en el usuario o la contraseña";
    }
}

$titulo = "Acceso de usuario";
include '../includes/header.php';

if(isset($error)) {
    printf('<p class="error">%s</p>', $error);
}
?>

<form action="login.php" method="post">
    <p>
        <input type="text" name="name" placeholder="Usuario ...">
    </p>
    <p>
        <input type="password" name="password" placeholder="Contraseña ...">
    </p>
    <p>
        <input type="submit" value="Entrar">
    </p>
</form>

<?php
include '../includes/footer.php';
?>