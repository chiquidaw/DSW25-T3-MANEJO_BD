<?php

use Dsw\Blog\DAO\UserDao;

require_once '../bootstrap.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("El ID no es válido.");
}


$id = $_GET['id'];

$userDao = new UserDao($pdo);
$user = $userDao->delete($id);

header('Location: users.php');
exit();
?>