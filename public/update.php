<?php
// Modificar un usuario

use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    die("El ID no es válido.");
}

$id = $_POST['id'];

if(isset($_POST['name'], $_POST['email'])) {
    $userDao = new UserDao($pdo);

    // Obtengo el usuario:
    $user = $userDao->get($id);

    // Modifico los datos:
    $user->setName($_POST['name']);
    $user->setEmail($_POST['email']);

    // Guardo el usuario:
    $userDao->update($user);
}

header('Location: users.php');
exit();
?>