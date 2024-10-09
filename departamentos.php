<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $pdo = new PDO('pgsql:host=localhost;dbname=datos', 'datos', 'hnmpl');
    $stmt = $pdo->query('SELECT * 
                         FROM departamentos
                         ORDER BY codigo');
    ?>
    <table border="1">
        <thead>
            <th>Código</th>
            <th>Denominación</th>
        </thead>
        <tbody>
            <?php foreach ($stmt as $fila):  ?>
                <tr>
                    <td><?= $fila['codigo']?></td>
                    <td><?= $fila['denominacion']?></td>
                    <td><?= $fila['localidad']?></td>
                </tr>
            <?php   endforeach   ?>
    </tbody>
    </table>
</body>
</html>