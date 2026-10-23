<?php
require 'protege.php';
require 'db.php';

$id   = (int) ($_POST['id'] ?? 0);
$nome = trim($_POST['nome'] ?? '');

if ($id > 0 && $nome !== '') {
    $consulta = "UPDATE categorias SET nome = ? WHERE id = ?";
    $stmt = mysqli_prepare($ligacao, $consulta);
    mysqli_stmt_bind_param($stmt, 'si', $nome, $id);
    mysqli_stmt_execute($stmt);
}
header('Location: categorias_listar.php');
exit;