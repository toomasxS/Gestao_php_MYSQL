<?php
require 'protege.php';
require 'db.php';

$nome = trim($_POST['nome'] ?? '');
if ($nome === '') {
    header('Location: categorias_novo.php');
    exit;
}

$consulta = "INSERT INTO categorias (nome) VALUES (?)";
$stmt = mysqli_prepare($ligacao, $consulta);
mysqli_stmt_bind_param($stmt, 's', $nome);
mysqli_stmt_execute($stmt);

header('Location: categorias_listar.php');
exit;