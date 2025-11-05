<?php
require_once '../vendor/autoload.php';

require_once 'conexion.php';

// Consulta SQL o manipulación de la base de datos.

// Usuario por ID.
$userId = '2';

$sql = "SELECT id, name, email, register_date FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute(['id' => $userId]);

$user = $stmt->fetch();

echo "<pre>";
print_r($user);
echo "</pre>";
printf('<p>Id: %s</p>', $user['id']);
printf('<p>Nombre: %s</p>', $user['name']);
printf('<p>Email: %s</p>', $user['email']);
printf('<p>Fecha registro: %s</p>', $user['register_date']);

// Desconexión.
$stmt = null;
$pdo = null;

?>