<?php
session_start();

use Dsw\Blog\DAO\UserDao;
use Dsw\Blog\Database;

require_once '../vendor/autoload.php';

try {
    $pdo = Database::getConnection();
} catch (PDOException $e) {
    die("Error al conectar la BD: " . $e->getMessage());
}

$user = null;
if (isset($_SESSION['user_id'])) {
    $userDao = new UserDao($pdo);
    $user = $userDao->get($_SESSION['user_id']);
}

?>