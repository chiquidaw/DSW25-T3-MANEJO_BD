<?php
require_once '../vendor/autoload.php';

require_once 'conexion.php';

// Consulta SQL o manipulación de la base de datos.

if (isset($_GET['id'])) {
    // Borrar el ID.
    $sql =  "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);
}
header('Location: selectAll.php');
exit();
?>