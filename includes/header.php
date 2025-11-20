<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Tema 3: Blog</h1>
        <?php
            if ($user) {
                printf('<p>Usuario: %s - %s</p>', $user->getName(), $user->getLevel());
            }
        ?>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="users.php">Usuarios</a></li>
                <li><a href="posts.php">Artículos</a></li>
                <?php
                    if ($user) {
                        echo '<li><a href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li><a href="login.php">Login</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>
    <h1><?= $titulo ?></h1>
    <div id="container">