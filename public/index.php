<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú principal</title>
</head>
<body>
    <?php
    require '../src/auxiliar.php';

    cabecera();
    ?>
    <ul>
        <li><a href="empleados">Empleados</a></li>
        <li><a href="departamentos">Departamentos</a></li>
        <li><a href="usuarios/login.php">Login</a></li>
    </ul>
    <script src="/js/flowbite/flowbite.js"></script>
</body>
</html>