<?php
session_start();

require '../../src/auxiliar.php';

$id = obtener_post('id');
if (!isset($id)) {
    $_SESSION['error'] = 'Falta el parámetro id';
    volver_departamentos();
    return;
}
$pdo = conectar();
$pdo->beginTransaction();
$pdo->exec('LOCK TABLE empleados IN SHARE MODE');
$fila = departamento_por_id($id, $pdo, true);
if ($fila === false) {
    $_SESSION['error'] = 'El departamento no existe';
    volver_departamentos();
    return;
}
$stmt = $pdo->prepare('SELECT COUNT(*)
                         FROM empleados
                        WHERE departamento_id = :id');
$stmt->execute([':id' => $id]);
$cuantos = $stmt->fetchColumn();
if ($cuantos > 0) {
    $_SESSION['error'] = 'El departamento tiene empleados';
    volver_departamentos();
    return;
}
$stmt = $pdo->prepare('DELETE FROM departamentos
                             WHERE id = :id');
$stmt->execute([':id' => $id]);
$pdo->commit();
$_SESSION['exito'] = 'El departamento se ha borrado correctamente';
volver_departamentos();