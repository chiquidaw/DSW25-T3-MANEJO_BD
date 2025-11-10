<?php

use Dsw\Blog\Database;

require_once '../vendor/autoload.php';

try {
    $pdo = Database::getConnection();
} catch (PDOException $e) {
    die("Error al conectar la BD: " . $e->getMessage());
}

?>